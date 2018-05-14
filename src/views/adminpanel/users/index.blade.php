@extends('adminpanel.layout.app')
  @section('title') Users @endsection
  @section('description')Users @endsection
  @section('keywords') @endsection
  @section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
      var Larvel = {
      Token:"{{ csrf_token() }}",
      Routedelete:"{{ Route('delete_user') }}",
      RouteNewButton:"{{ Route('create_registration') }}",
      button:"Add User"
      }; 
    </script>
  @endsection
  @section('content') 
      <section class="content" id="app">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
               <buttonelement></buttonelement>
              </div>
              <form  method="post" action="{{Route('delete_all_users')}}">
                <div class="box-body">
                    <input type="hidden" class="form-control"  name="_token"  value="{{ csrf_token() }}" >
                    <table id="example2" class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>UserName</th>
                          <th>Email</th>
                          <th>Registeration at</th>
                          <th>Permission</th>
                          <th>option</th>
                          <th>option</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $userinfo)
                          <tr id="item{{$userinfo->id}}">
                            <td>
                              @if($userinfo->id != 1)
                              {!! Form::checkbox('element[]',$userinfo->id,null, ['class' => 'checkboxelement']) !!}
                              @endif
                            </td>
                            <td class="user-name">
                              <a href="{{ Route('edit_user',$userinfo->slug) }}">{{ $userinfo->name }}</a>
                            </td>
                            <td>{{ $userinfo->email }}</td>
                            <td>{{ $userinfo->created_at }}</td>
                            <td class="premession" > {{$userinfo->permission == 1 ? 'Administrator' : 'Users'}}</td>
                            <td> 
                                <a href="{{ Route('edit_user',$userinfo->slug) }}" class="btn btn-danger btn-outline btn-rounded btn-sm fa fa-edit" role="button"> Edit  </a> 
                            <td> 
                              @if($userinfo->permission != 1)
                                <deleteelement :userinfo="{{$userinfo}}"></deleteelement>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <center>{{ $user->links() }}</center>
                      <button type="button" id="button" class="btn btn-danger btn-outline btn-rounded btn-sm"  value="Enter">Select All</button>
                      <button type="submit" id="submitone" class="btn btn-danger btn-outline btn-rounded btn-sm glyphicon glyphicon-trash" disabled   value="Enter"> Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
  @endsection
  @section('footer')
    <script src="{{ asset('public/js/app.js') }}"></script>
    @include('adminpanel.users.js')
  @endsection

