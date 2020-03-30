@extends('main')
@section('title','EditPost')
@section('content')


      <div class="row justify-content-md-center">
    
    <div class="col-md-5">
        <h2>Edit Post</h2><hr/>

{!! Form::model($post,['route' => ['posts.update',$post->id], 'method'=>'PUT']) !!}
     {{Form::label('title','Title:')}}
     {{Form::text('title',null, ['class'=>'form-control'])}}

        {{Form::label('category_id','Category:')}}
        {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
         
          {{Form::label('tags','Tags:')}}
          {{Form::select('tags[]', $tags, null, ['class'=>'form-control select-mult', 'multiple'=>'multiple'])}}
               
     {{Form::label('description',"body")}}
     {{Form::textarea('description',null,['class'=>'form-control'])}}

      {{Form::submit('Save Post',array('class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px'))}}
{!! Form::close() !!}

   </div>
    
    </div>

      <div class="row justify-content-md-center">
    
    <div class="col-md-5" style="margin-top: 6px">
     {!! Html:: linkRoute('posts.index', 'Cancel',array(), array('class'=>'btn btn-block btn-danger' ))!!}
    
    </div>
    </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $('.select-mult').select2();
  </script>
  @endsection