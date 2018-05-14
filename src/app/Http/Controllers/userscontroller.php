<?php

namespace App\Http\Controllers;

use larvelcode\panel\functions\helperfunction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\userpicture;
use Carbon\Carbon;
use Validator;
use Response;
use App\User;

class userscontroller extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	public function index()
	{
      $user = User::paginate(20);
      return view('adminpanel.users.index', compact('user'));
	}
	public function create()
	{
	  return view('adminpanel.users.create');
	}
    public function store(Request $request)
    { 
		$this->validate(request(),[ 'name'                  => 'required|max:255|min:6',
									'email'                 => 'required|email|max:255|unique:users',
									'password'              => 'required|min:6|confirmed',
									'password_confirmation' => 'required',
									'permission'            => 'required',
									'career'                => 'required',
									'picture'               => 'mimes:jpeg,jpg,png,gif|max:5000|image',
									'information'           => 'min:6']);      
	    //Slug 
	    //User permission 
        if ($request->permission) {
	    	if ($request->permission == 'administrator') {
	    		$request->permission = 1;
	    	}
	    	elseif ($request->permission == 'user') {
	    		$request->permission = 2;
	    	}
        }

	    //User creatation
    	$create_user = User::create([
			'name'       => $request->name,
			'slug'       => helperfunction::slug('users',$request->name),
			'email'      => $request->email, 
		    'password'   => bcrypt($request->password),
			'permission' => $request->permission,
			'career'     => $request->career,
			'information'=> $request->information,
	        'online'     => Carbon::now()
    	]);
		if ($request->picture) {
			$data_array = array( 
			'request_file'          => $request->picture,
			'table_name'            => 'userpictures',
			'column_relation'       => 'user_id',
			'comlum_relation_value' => $create_user->id,
			'column_filles'         => 'picture', 
			'directory'             => 'public/imfilles'
		    );
		    
			helperfunction::single_picture($data_array);
	    }
		notify()->flash('Done', 'success', [
		    'timer' => 3000,
		    'text' => 'User Was Successfuly Added',
		]);
		return Redirect(Route('allusers')); 	    
    }
    public function edit($slug)
    {
      $user = User::where('slug','=',$slug)->with('picture')->first();
      if ($user) {
      	return view('adminpanel.users.edit',compact('user')); 
      }
       abort(404);
    }
	public function update($slug,Request $request)
	{
		$user = User::where('slug','=',$slug)->first();
		if (isset($user)) 
		{
			$this->validate($request,['name' =>'required|min:4']);
			$user ->update([
				'permission'    => $request->permission,
				'career'        => $request->career,
				'information'   => $request->information
			]);
			if ($request->input('name') !== $user->name) {
				$user ->update([
				'name'          => $request->name,
				'slug'          => helperfunction::slug('users',$request->name)
				]);
			}
			if ($request->input('email') !== $user->email) 
			{
				$this->validate($request,['email' =>'required|email|max:255|unique:users']);
				$user ->update(['email'   => $request->email]);
				if ($slug == Auth::user()->slug) 
				{
					Auth::logout();
					return redirect('/login');
				}
			}
			if (!empty($request->input('password'))) 
			{  
				$this->validate($request,['password' =>'required|min:6|confirmed']);
				$password = bcrypt($request->password);
				$user->update(['password' => $password ]);
				if ($slug == Auth::user()->slug) 
				{
					Auth::logout();
					return redirect(url('/login'));
				}
			}
			if ($request->file('picture')) {
				$user_picture = userpicture::where('user_id','=',$user->id);
				$user_picture->update(['picture_value' => 'false']);
				$data_array = array( 
				'request_file'          => $request->picture,
				'table_name'            => 'userpictures',
				'column_relation'       => 'user_id',
				'comlum_relation_value' => $user->id,
				'column_filles'         => 'picture', 
				'directory'             => 'public/imfilles'
			    );
				helperfunction::single_picture($data_array);
		    }
			notify()->flash('Done', 'success', [
			'timer' => 5000,
			'text' => 'User Information Updated by  '.Auth::User()->name.' successfully'
			]);
			return Redirect(Route('edit_user', $user->slug)); 
		}
		abort(404);
	}
	public function destory(Request $request)
	{
	  $user = User::where('slug','=',$request->slug)->first();
	  if ($user) {
		  	if ($user->id !== 1) {
		  		$user_delete = User::find($user->id)->delete();
		  		return response()->json($user->id);
		  	}
	  }

	  return response()->json(["error"=>"you can't delete this element"],405);
	}
	public function destoryall(Request $request)
	{
	    if ($request->element != false) 
	    {
	      foreach ($request->element as  $value) 
	      {
	        if ($value == 1) 
	        {
	          notify()->flash('Oops!', 'error', [
	          'timer' => 5000,
	          'text' => Auth::User()->name.' Delete Unsucessfully Because You Cant Delete this element',
	          ]);
	          return back(); 
	        }
	        else{
	          User::find($value)->delete();
	        }
	      }
	      notify()->flash('Deleted', 'success', [
	      'timer' => 5000,
	      'text' => 'Elements removed by '.Auth::User()->name.' successfully',
	      ]);
	      return back(); 
	    }
	    else{
	      notify()->flash('Oops!', 'error', [
	      'timer' => 5000,
	      'text' => Auth::User()->name.' Delete Unsucessfully Because no element you selected',
	      ]);
	      return back();
	    }
	}
	public function select_picutre(Request $request)
	{
		$data_array = array('table_name'                  => 'userpictures',
		                    'column_relation'             => 'user_id',
		                    'comlum_relation_value'       => $request->user_id, 
		                    'column_permission'           => 'picture_value',
		                    'column_permission_value_all' => 'false',
		                    'column_permission_value'     => 'true',
		                    'target_selected_id'          => $request->id);
        helperfunction::select_picutre($data_array);
	}
    public function delete_picture(Request $request)
    {
      $picture_delete = userpicture::find($request->id);
      if ($picture_delete) {
      	$picture_delete->delete();
      	return response()->json($request->id);
      }  
    }
}
