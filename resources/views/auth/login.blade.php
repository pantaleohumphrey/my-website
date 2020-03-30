@extends('main')
@section('title','login')
@section('content')
 <div class="row justify-content-md-center">
 	<div class="col-md-4 ">
 	<h2>Login</h2><hr/>
 		{!!Form::open()!!}
 		{{Form::label('email','Email')}}
 		{{Form::email('email',null,['class'=>'form-control'])}}

 		{{Form::label('password','Password')}}
 		{{Form::password('password',['class'=>'form-control'])}}
 		
 		{{Form::checkbox('remember')}}
 		{{Form::label('remember','Remember Me')}}
 		<br>

 		{{Form::submit('Login',['class'=>'btn btn-primary '])}}

         <p><a href="{{url('password/reset')}}">Forgot Password</a></p>
 		{!!Form::close()!!}
 	</div>
 </div>


@endsection