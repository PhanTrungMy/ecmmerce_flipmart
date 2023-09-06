@extends('frontend.main_master')
@section('content')
@php
  $user = DB::table('users')->where('id',Auth::user()->id)->first()  
@endphp
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
          <img src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" class="card-img-top" style="border-radius: 50%" height="100%" width="100%">
          <br><br>
          <ul class="list-group list-group-flush">
            <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
            <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
            <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>

          </ul>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Change Password</span>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('user.password.update')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="current_password" value="{{ __('current_Password') }}" >Current Password <span>*</span></label>
                            <input type="password" id="current_password" class="form-control unicase-form-control text-input"  name="oldpassword">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password" value="{{ __('Password') }}" >Password <span>*</span></label>
                            <input type="password" id="password" class="form-control unicase-form-control text-input"  name="password">
                        </div>
                         <div class="form-group">
                            <label class="info-title" for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" id="password_confirmation" >
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