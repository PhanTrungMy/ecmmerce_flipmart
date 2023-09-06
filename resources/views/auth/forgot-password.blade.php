@extends('frontend.main_master')
@section('content')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>{{__('Forget password')}} </li>
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
	<h4 class="">{{__('Forget password')}}</h4>
	<p class="">{{__('forget your password ? No Problem')}}</p>


    <form method="POST" action="{{ route('password.email') }}">
		@csrf
		<div class="form-group">
		    <label class="info-title" for="email" value="{{ __('Email') }}"  >Email Address <span>*</span></label>
		    <input type="email" id="email" class="form-control unicase-form-control text-input"  name="email":value="old('email')"  required placeholder="Username">
		</div>
	
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Email Password Reset Link') }}</button>
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