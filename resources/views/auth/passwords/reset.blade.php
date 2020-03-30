@extends('main')
@section('title','Forgot Password ')
@section('content')
 <div class="row justify-content-md-center">
 	<div class="col-md-5 ">
 	<h3>Reset Password</h3>
 	<hr/>
 		{!!Form::open(['url'=>'password/reset', 'method'=>"POST"])!!}

 		{{Form::hidden('token', $token)}}
 		{{Form::label('email','EmailAddress')}}
 		{{Form::email('email',$email,['class'=>'form-control'])}}
 		{{Form::label('password','NewPassword')}}
 		{{Form::password('password',['class'=>'form-control'])}}
 		{{Form::label('password_confirmation','ConfirmPassword')}}
 		{{Form::password('password_confirmation',['class'=>'form-control'])}}
 		<br>
 		{{Form::submit('Reset Password',['class'=>'btn btn-primary '])}}

 		{{Form::close()}}
 	</div>
 </div>


@endsection