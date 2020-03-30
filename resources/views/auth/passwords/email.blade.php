@extends('main')
@section('title','Forgot Password ')
@section('content')

  @if(Session('status'))
   <div class="alert alert-success">{{Session('status')}}</div>
  @endif
 <div class="row justify-content-md-center">
 	<div class="col-md-5 ">
 	<h3>Reset Password</h3>
 	<hr/>
 		{!!Form::open(['url'=>'password/email', 'method'=>"POST"])!!}
 		{{Form::label('email','EmailAddress')}}
 		{{Form::email('email',null,['class'=>'form-control'])}}

 		
 		<br>

 		{{Form::submit('Reset Password',['class'=>'btn btn-primary '])}}

 		{{Form::close()}}
 	</div>
 </div>


@endsection