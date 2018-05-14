@extends('adminpanel.layout.app')
@section('title') Register Users @endsection
@section('description') Register Users @endsection
@section('keywords') @endsection
@section('header')

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
								<h3 class="text-center txt-dark mb-10">Register New User</h3>
								<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
							</div>	
							<div >
				              @if($errors->any())
				                <ul class="alert alert-danger">
				                  @foreach($errors->all() as $error)
				                    <li>{{$error}}</li>
				                  @endforeach 
				                </ul>
				              @endif
								<form method="POST" action="{{action('userscontroller@store')}}" enctype="multipart/form-data">
									{{ csrf_field() }}

						              <div class="form-group col-sm-11">  
						                <label  for="permission"> permission: </label>
						                  <select class="form-control" required id="permission"  name="permission">
						                    <option value="1">Administrator</option>
						                    <option value="2">User</option>
						                  </select> 
						              </div>
									<div class="form-group col-sm-11">
										<label class="control-label mb-10" for="name">Username</label>
										<input type="text" class="form-control" name="name" value="{{ old('name') }}" required id="name" placeholder="Enter Username">
									</div>
									<div class="form-group col-sm-11">
										<label class="control-label mb-10" for="email">Email address</label>
										<input type="email" class="form-control" name="email" value="{{ old('email') }}" required id="email" placeholder="Enter email">
									</div>
									<div class="form-group col-sm-11">
										<label  for="password">Password</label>
										<input id="password" type="password" class="form-control heigh-large" name="password" required placeholder="Enter Password">
									</div>
									<div class="form-group col-sm-11">
										<label  for="exampleInputpwd_3">Confirm Password</label>
										<input id="password-confirm" type="password" class="form-control heigh-large" name="password_confirmation" required placeholder="Enter password confirmation">
									</div>
						              <div class="form-group col-sm-11">  
						                <label  for="career"> Career: </label>
						                  <input type="text" class="form-control" name="career" id="career" placeholder="Input career" >
						              </div>

						              <div class="form-group col-sm-11 ">
						                <label  for="picture"> Picture: </label>
											<input id="picture" name="picture" type="file" class="file" multiple>
						                </div>

						              <div class="form-group col-sm-11">
						                <label for="about_me"> Information: </label>
						                  <textarea class="form-control" rows="10" id="information"  name="information"></textarea>  
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

<script>
$(document).on('ready', function() {
    
    $("#picture").fileinput({
        initialPreviewAsData: true,
        overwriteInitial: false,
    });
});
</script>
@endsection

		

