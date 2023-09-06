@extends('frontend.main_master')
@section('content')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>{{__('Reset password')}} </li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">{{__('Reset password')}}</h4>
	<p class="">{{__('Reset your password ? No Problem')}}</p>

    <form method="POST" action="{{ route('password.update') }}">
		@csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
		<div class="form-group">
		    <label class="info-title" for="email" value="{{ __('Email') }}"  >Email Address <span>*</span></label>
		    <input type="email" id="email" class="form-control unicase-form-control text-input"  name="email":value="old('email', $request->email)"  required placeholder="">
		</div>
        <div class="form-group">
		    <label class="info-title" for="password" value="{{ __('Password') }}" >Password <span>*</span></label>
		    <input type="password" id="password" class="form-control unicase-form-control text-input"  name="password">
		</div>
         <div class="form-group">
		    <label class="info-title" for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" id="password_confirmation" >
		</div>
	
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button"> {{ __('Reset Password') }}</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->

		</div><!-- /.row -->
		</div><!-- /.sigin-in-->


		@include('frontend.body.brand')
	</div>
</div>

@endsection