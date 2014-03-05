@extends('layout.main')

@section('content')
<div class="login-form">
	<div class="col-md-4 col-md-offset-1">
		<h3><span class="fa fa-sign-in"></span> Sign In</h3>
		<hr>
		{{Form::open(array('url'=>'login', 'method'=>'post', 'class'=>'form form-vertical', 'autocomplete'=>'off'))}}
		<div class="form-group">
			{{Form::text('username', '', array('class'=>'form-control input-sm', 'placeholder'=>'Username'))}}

			@if($errors->has('username'))
			<span class="help-block">{{$errors->first('username')}}</span>
			@endif
		</div>
		<div class="form-group">
			{{Form::password('password', array('class'=>'form-control input-sm', 'placeholder'=>'Password'))}}

			@if($errors->has('password'))
			<span class="help-block">{{$errors->first('password')}}</span>
			@endif
		</div>
		<div class="form-group text-right">
			<button class="btn btn-md btn-primary">{{_('Sign In')}}</button>
		</div>
		{{Form::close()}}
	</div>

	<div class="col-md-5 col-md-offset-1">
		<h3><span class="fa fa-info-circle"></span> {{_('Quick Help')}}</h3>
		<hr>
		<ol>
			<li><a href="{{url('/reset-password')}}">{{_('Forgot password? Click here.')}}</a></li>
			<li><a href="{{url('/retrieve-username')}}">{{_('Forgot username? Get it back here.')}}</a></li>
			<li>{{_('If you have any problem signing in')}}, <a href="{{url('/contact-us')}}">{{_('contact us')}}</a></li>
		</ol>
	</div>
</div>
@stop