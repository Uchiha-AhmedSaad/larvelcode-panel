<?php

namespace larvelcode\panel\functions;
use Illuminate\Support\Facades\DB;
use Validator;
use Response;


class helperfunction
{
   public static function slug($table_name,$request_slug)
   {
		$search_slug = DB::table($table_name)->where('slug', str_slug($request_slug))->count();
		if ($search_slug == 0) {
			$new_product_slug = str_slug($request_slug);
		}
		elseif($search_slug > 0){
			$rand_slug = str_slug($request_slug).'-'.rand(1,10);
			$search_slug_again = DB::table($table_name)->where('slug', $rand_slug)->count();
			if ($search_slug_again == 0) {
				$new_product_slug = $rand_slug;
			}
			elseif ($search_slug_again > 0) {
				$new_product_slug = uniqid(str_slug($rand_slug), true);
			}
		}
	    return $new_product_slug;
   }
   /* 
	   * $request_file : this is array of all picture
	   * $table_name : the table that contain picture
	   * $column_relation : the column relation unsign
	   * $comlum_relation_value : the value of this column relation
	   * $column_filles : the name of column of that picture or files
	   * $directory : the directory of files or pictures
   */
   public static function multipel($data_array,
   	                               $column_permission       = 'picture_value',
                                   $column_permission_value = 'false',
   	                               $created_at              = 'created_at',
   	                               $updated_at              = 'updated_at')
   {
		extract($data_array);
		foreach ($request_file as $request_filles) {
			$rules = array($column_filles  => 'mimes:jpeg,jpg,png,gif|max:5000|image'); 
			// 'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator = Validator::make(array($column_filles => $request_filles), $rules);
			if($validator->passes()) {
				$images = $request_filles->store($directory);
				$image_name = $request_filles->getClientOriginalName();
				DB::table($table_name)->insert([$column_relation      => $comlum_relation_value,
					                            $column_filles        => $images,
					                            $column_permission    => $column_permission_value,
					                            'picture_name'        => $image_name,
					                            $created_at           => date('Y-m-d h-i-s'),
					                            $updated_at           => date('Y-m-d h-i-s')]);
			} else {
				// redirect back with errors.
				return back()->withInput()->withErrors($validator);
			}
	    }
        functions::update_true($table_name,$column_relation,
        	                   $comlum_relation_value,$column_permission);
   }
   public static function single_picture($data_array,
   	                                     $column_permission       = 'picture_value',
   	                                     $column_permission_value = 'true',
   	                                     $created_at              = 'created_at',
   	                                     $updated_at              = 'updated_at')
   {
   	    extract($data_array);
		$rules = array($column_filles  => 'mimes:jpeg,jpg,png,gif|max:5000|image'); 
		// 'required|mimes:png,gif,jpeg,txt,pdf,doc'
		$validator = Validator::make(array($column_filles => $request_file), $rules);
		if($validator->passes()) {
			$images = $request_file->store($directory);
			$image_name = $request_file->getClientOriginalName();
			DB::table($table_name)->insert([$column_relation     => $comlum_relation_value,
				                            $column_filles       => $images,
				                            'picture_name'       => $image_name,
				                            $column_permission   => $column_permission_value,
											$created_at          => date('Y-m-d h-i-s'),
											$updated_at          => date('Y-m-d h-i-s')]);
		} else {
			// redirect back with errors.
			return back()->withInput()->withErrors($validator);
		}
   }
   public static function update_true($table_name,
   	                                  $column_relation,
   	                                  $comlum_relation_value,
   	                                  $column_permission)
   {
		$update_true = DB::table($table_name)
		->where($column_relation,$comlum_relation_value)
		->where($column_permission,'=','true')->get();
		if (count($update_true) == 0) {
			$update_permission = DB::table($table_name)->where($column_relation,$comlum_relation_value)
			->orderByRaw('id ASC')
			->limit(1)
			->update([$column_permission => 'true']);
		}   	
   }
   public static function select_picutre($data_array)
   {
   	    extract($data_array);
		$picture = DB::table($table_name)->where($column_relation,$comlum_relation_value)
		->orderByRaw('id ASC')
		->update([$column_permission => $column_permission_value_all]);
		$picture_selected = DB::table($table_name)->where('id',$target_selected_id);
		$picture_selected->update([$column_permission => $column_permission_value]);
		return response()->json($target_selected_id);
   }
   public static function my_route()
   {
        $array = array(
        "/* Welcome in My Adminpanel */".PHP_EOL,
          "Auth::routes();".PHP_EOL,
          "Route::get('/adminpanel' , 'admincpcontroller@index')->name('mainpage');".PHP_EOL,
          "Route::get('adminpanel/users', 'userscontroller@index'  )->name('allusers');".PHP_EOL,
          
          "Route::get('adminpanel/create_registration', 
          'userscontroller@create' )->name('create_registration');".PHP_EOL,

          "Route::post('/adminpanel/store_registration', 
          'userscontroller@store'  )->name('store_registration');".PHP_EOL,

          "Route::get('adminpanel/edit_user/{slug}', 
          'userscontroller@edit'   )->name('edit_user');".PHP_EOL,

          "Route::patch('adminpanel/update_userinfo/{slug}', 
          'userscontroller@update' )->name('update_userinfo');".PHP_EOL,

          "Route::post('adminpanel/delete_users', 
          'userscontroller@destory')->name('delete_user');".PHP_EOL,

          "Route::post('adminpanel/delete_all_users', 
          'userscontroller@destoryall')->name('delete_all_users');".PHP_EOL,

          "Route::post('adminpanel/users/select_user_picture',
          'userscontroller@select_picutre')->name('select_user_picture');".PHP_EOL,

          "Route::post('adminpanel/users/delete_user_picture','userscontroller@delete_picture')->name('delete_user_picture');".PHP_EOL
        ); 
        return $array;
   }
	public static function if_route_exist()
	{
      $routes_web = file_get_contents('routes/web.php');
      $search_routes = strpos($routes_web, 'Welcome in My Adminpanel');
      if (!$search_routes) {
        file_put_contents('routes/web.php',helperfunction::my_route(), FILE_APPEND | LOCK_EX);
      }
	}
}