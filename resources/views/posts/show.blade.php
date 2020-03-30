@extends('main')
 @section('title','Posts created')

 @section('content')
 
 @if(Session::has('success'))
   <div class="alert alert-success" role="alert" style="margin-top: 20px">
   	{{Session::get('success')}}
   </div>
 
@endif

<div class="row">
<div class="col-md-8">
	<h2>{{$post->title}}</h2>
  <p class="lead">{{$post->description}}</p>
   <p class="lead">{{$post->category->name}}</p>
   <hr>
   <div class="tags">
       @foreach($post->tags as $tag)
           <span class="label label-primary">{{$tag->name}}</span>
       @endforeach
   </div>
</div>
<div class="col-md-4">
   <div class="well">
   	 <dl class="dl-horizontal">
   	 	 <dt> Created At:</dt>
   	 	 <dd>{{$post->created_at}}</dd>
   	 	
   	 </dl>
   	 <dl class="dl-horizontal">
   	 	 <dt> Last Updated At:</dt>
   	 	  <dd>{{$post->updated_at}}</dd>
   	 </dl>
   	 <hr>
   	  <div class="row">
   	  	<div class="col-sm-6">
   	  	{!! Html:: linkRoute('posts.edit', 'Edit', array($post->id),array('class'=>'btn btn-primary btn-block'))!!}
   	  		 
   	  	</div>
   	  	<div class="col-sm-6">
   	  	{!! Form::open(['route'=>['posts.destroy',$post->id], 'method'=>'DELETE']) !!}
   	  	 {!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
   	  		 {!!Form::close()!!}
   	  	 
   	  	</div>
   	  </div>
   	   <div class="row">
   	  <div class="col-md-12" style="margin-top: 6px">
     {!! Html:: linkRoute('posts.index', '<< View all Posts',array(), array('class'=>'btn btn-block btn-default' ))!!}
    </div>
    </div>
   	 </div>
   
</div>
</div>
 @endsection