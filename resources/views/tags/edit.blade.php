@extends('main')
@section('title','EditCategory')
@section('content')


      <div class="row justify-content-md-center">
    
    <div class="col-md-5">
        <h2>Edit Tag</h2><hr/>

{!! Form::model($tags,['route' => ['tags.update',$tags->id], 'method'=>'PUT']) !!}
     {{Form::label('name','Name:')}}
     {{Form::text('name',null, ['class'=>'form-control'])}}

      {{Form::submit('Save Update',array('class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px'))}}
{!! Form::close() !!}

   </div>
    
    </div>

      <div class="row justify-content-md-center">
    
    <div class="col-md-5" style="margin-top: 6px">
     {!! Html:: linkRoute('tags.index', 'Cancel',array(), array('class'=>'btn btn-block btn-danger' ))!!}
    
    </div>
    </div>
@endsection