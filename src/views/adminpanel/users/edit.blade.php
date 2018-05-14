@extends('adminpanel.layout.app')
@section('title') {{$user->name}} @endsection
@section('description') Edit User  @endsection
@section('keywords') @endsection
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection
@section('content')  
<div class="box-typical box-typical-padding">
	<div class="container-fluid">
		<!-- Row -->
		<div class="table-struct full-width full-height">
			<div class="table-cell vertical-align-middle auth-form-wrap">
				<div class="auth-form  ml-auto mr-auto no-float">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="mb-30">
								<h3 class="text-center txt-dark mb-10">{{$user->name}}</h3>
								<h6 class="text-center nonecase-font txt-grey">Edit your details below</h6>
							</div>	
							<div >
				              @if($errors->any())
				                <ul class="alert alert-danger">
				                  @foreach($errors->all() as $error)
				                    <li>{{$error}}</li>
				                  @endforeach 
				                </ul>
				              @endif
								<form method="POST" action="{{Route('update_userinfo',$user->slug)}}" enctype="multipart/form-data">
									{{ csrf_field() }}
									  <input type="hidden" class="form-control"  name="_method"  value="PATCH" >
						              <div class="form-group col-sm-11">  
						                <label  for="permission"> permission: </label>
						                  <select class="form-control" required id="permission" value="{{$user->permission}}"  name="permission">
						                    <option value="1">Administrator</option>
						                    <option value="2">User</option>
						                  </select> 
						              </div>
									<div class="form-group col-sm-11">
										<label class="control-label mb-10" for="name">Username</label>
										<input type="text" class="form-control" name="name" value="{{$user->name}}" required id="name" placeholder="Enter Username">
									</div>
									<div class="form-group col-sm-11">
										<label class="control-label mb-10" for="email">Email address</label>
										<input type="email" class="form-control" name="email" value="{{$user->email}}" required id="email" placeholder="Enter email">
									</div>
									<div class="form-group col-sm-11">
										<label  for="password">Password</label>
										<input id="password" type="password" class="form-control heigh-large" name="password"  placeholder="Enter Password">
									</div>
									<div class="form-group col-sm-11">
										<label  for="exampleInputpwd_3">Confirm Password</label>
										<input id="password-confirm" type="password" class="form-control heigh-large" name="password_confirmation"  placeholder="Enter password confirmation">
									</div>
						              <div class="form-group col-sm-11">  
						                <label  for="career"> Career: </label>
						                  <input type="text" class="form-control" name="career" value="{{$user->career}}" id="career" placeholder="Input career" >
						              </div>
										@if(count($user->picture) != 0)	
											<div class="form-group col-sm-11 ">
												<label  for="image"> Pictures: </label> 
												@foreach($user->picture as $propicture)
													<div id="image{{$propicture->id}}" class="col-sm-3">
															@if($propicture->picture_value == 'true')
																<a class="col-sm-12" href="{{url(imagesdirectory().Storage::disk('local')->url($propicture->picture))}}" data-lightbox="{{$propicture->id}}" data-title="{{$propicture->picture_name}}"><img id="image{{$propicture->id}}" class="img-select img-marg selected" height="183" width="183"  src="{{url(imagesdirectory().Storage::disk('local')->url($propicture->picture))}}"></a>
																@else
																<a class="col-sm-12" href="{{url(imagesdirectory().Storage::disk('local')->url($propicture->picture))}}" data-lightbox="{{$propicture->id}}" data-title="{{$propicture->picture_name}}"><img id="image{{$propicture->id}}" class="img-haverover img-marg unselected" height="183" width="183"  src="{{url(imagesdirectory().Storage::disk('local')->url($propicture->picture))}}"></a>
																<button type="button" id="delete{{$propicture->id}}" class="img-delete btn btn-rounded btn-inline btn-sm btn-primary-outline"  data-id="{{$propicture->id}}">X</button>
															@endif
															@if($propicture->picture_value != 'true')
																<button id="button{{$propicture->id}}"  class="btn btn-rounded btn-inline btn-sm btn-primary-outline img-button" data-id="{{$propicture->id}}" type="button">Select</button>

															@endif
													</div> 
												@endforeach
											</div>
										@endif
						              <div class="form-group col-sm-11">
						                <label  for="picture"> Picture: </label>
						                  <input type="file" name="picture" id="picture" class="file" data-max-file-size="10000"  data-default-file="{{url(imagesdirectory().Storage::disk('local')->url($user->picture))}}"/>
						                </div>

						              <div class="form-group col-sm-11">
						                <label for="about_me"> Information: </label>
						                  <textarea class="form-control" rows="10" id="information"  name="information">{{$user->information}} </textarea>  
						              </div>
									<div class="form-group col-sm-12 text-right" style="padding: 10px;">
										<button type="submit" class="btn btn-info btn-rounded">Submit</button>
									</div>
								</form>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->	
	</div>
</div><!--.box-typical-->
@endsection	
@section('footer')
<script type="text/javascript">
	$("#permission").val($("#permission").attr('value'));
	$('.img-button').on('click', function(){
		  var image = $(this).attr('data-id');
	      $.ajax({
	        type: 'post',
	        url: "{{Route('select_user_picture')}}",
	        data: {
	        '_token': $('meta[name=csrf-token]').attr('content'),
	        'user_id':"{{$user->id}}",
	        'id': image
	        },
	        success: function(data) {
	          $('#button'+data).remove();
	          $('.img-marg').removeClass('selected');
              location.reload();
	        }
	      });
	});
	$('.img-delete').on('click', function(){
		  var deleteimage = $(this).attr('data-id');
	      $.ajax({
	        type: 'post',
	        url: "{{Route('delete_user_picture')}}",
	        data: {
	        '_token': $('meta[name=csrf-token]').attr('content'),
	        'id': deleteimage
	        },
	        success: function(data) {
	        	console.log(data);
	          $('#image'+data).remove();
	        }
	      });		
	});
</script>
@endsection

		

