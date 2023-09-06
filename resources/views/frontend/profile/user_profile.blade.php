@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
          <img src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" class="card-img-top" style="border-radius: 50%" height="100%" width="100%">
          <br><br>
          <ul class="list-group list-group-flush">
            <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
            <a href="{{'user.password'}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
            <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>

          </ul>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Hi...</span>
                        <strong>{{Auth::user()->name}}</strong>
                        welcome update your profile
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('user.profile.store')}}" method="post" accept="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="name" value="{{ __('name') }}" >Name </label>
                            <input type="text" id="name" class="form-control "  name="name" value="{{$user->name}}">
                        
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email" value="{{ __('email') }}" >Email </label>
                            <input type="email" id="email" class="form-control "  name="email" value="{{$user->email}}">
                        
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="phone" value="{{ __('phone') }}" >Phone </label>
                            <input type="text" id="phone" class="form-control "  name="phone" value="{{$user->phone}}">
                        
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="phone" value="{{ __('profile_photo_path') }}" >User Image </label>
                            <input type="file" id="profile_photo_path" class="form-control "  name="profile_photo_path" value="{{$user->profile_photo_path}}">
                        
                        </div>
                   
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection