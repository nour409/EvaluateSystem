@extends('layout.master',['head_bar'=>1,'subject'=>"Account",'branch'=>'','sub_branch'=>'','profile'=>''])
@section('content')

    @if(isset($success))
        <div class="alert alert-success w-75 m-auto">
            password updated successfuly
        </div>
    @endif

    @if(isset($fail))
        <div class="alert alert-danger w-75 m-auto ">
            password is not correct
        </div>
    @endif

    <div class="container-fluid profile">

        <div class="row">
            <div class="col-lg-3 col-sm-12 img_profile_container" >
                <img src="{{URL::asset('images/users/'.$user->photo)}}" id="image_profile">
                <form class="edit_icon" id="form_userImg" method="post" action="{{route('profile.editPhoto',$user)}}"
                      enctype="multipart/form-data">
                    @csrf
                    <label for="editPhotoUser">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </label>
                    <input type="file" id="editPhotoUser" name="photo" onchange="submitEditPhotoUser()">

                </form>
            </div>
            <div class="col-lg-3 col-sm-12 content_profile" >

                <h1>@if($user->role>0)
                        Dr/
                    @endif
                        {{$user->name}}</h1>
                <h5>
                    Username: {{$user->username}}
                </h5>

            </div>
            <div class="col-lg-6 col-sm-12 edit_password">

                <form action="{{route('profile.editPassword',$user)}}" method="post" class="d-flex flex-column justify-content-center ">
                    @csrf
                   <h3>Edit password</h3>
                    <input type="password" placeholder="  current password" name="old_password">
                    <input type="password" placeholder="  new password" name="new_password">
                    <button class="btn btn-primary">
                        submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
