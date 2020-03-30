@extends('main')
@section('title','Register')
@section('content')
 <div class="row justify-content-md-center">
 	<div class="col-md-4 ">
 	<h2>Register</h2><hr/>
 		{!!Form::open()!!}
 		{{Form::label('name','Name')}}
 		{{Form::text('name',null,['class'=>'form-control'])}}

 		{{Form::label('email','Email')}}
 		{{Form::email('email',null,['class'=>'form-control'])}}

 		{{Form::label('password','Password')}}
 		{{Form::password('password',['class'=>'form-control'])}}

 		{{Form::label('password_confirmation','Confirm Password')}}
 		{{Form::password('password_confirmation',['class'=>'form-control'])}}
 		
 		<br>

 		{{Form::submit('Register',['class'=>'btn btn-primary '])}}

 		{!!Form::close()!!}
 	</div>
 </div>


@endsection