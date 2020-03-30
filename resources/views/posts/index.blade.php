@extends('main')
@section('title', 'All Posts')

@section('content')

@if(Session::has('success'))
   <div class="alert alert-danger" role="alert" style="margin-top: 20px">
      {{Session::get('success')}}
   </div>
 
@endif
 <div class="row">
 	 <div class="col-md-10">
 	 	 <h2 class="button-spacing">All POST</h2>
 	 </div>
 	 <div class="col-md-2">
 	 	 <a href="{{route('posts.create')}}" class="btn btn-primary btn-block button-spacing" >Create New Post</a>
 	 </div>
 	  </div>
 	 <!-- <div class="col-md-12">
 	 	 <hr>
 	 </div> -->
 	   <!--endof row the top one-->

 	   <div class="row">
 	   	 <div class="col-md-12">
 	   	 	 <table class="table table-striped">

<thead>
<tr>
<th>#</th>
<th>Title</th>
<th>Category</th>
<th>Description</th>
<th>Create At</th>

<th></th>

</tr>
</thead>
<tbody>
   @foreach($posts as $post)

   
   <tr>
   <th>{{$post->id}}</th>
   <td>{{ $post->title}}</td>
    <td>{{ $post->category->name}}</td>
   <td>{{substr($post->description,0,4)}}{{strlen($post->description)>4 ? "...." : ""}}</td>
   <td>{{date('M j , Y H:ia',strtotime($post->created_at))}}</td>
   <td>
   <a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-sm">View</a>
   <a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a>
   </td>
</tr>
@endforeach
<tr>

</tbody>
</table>
          <div class="row justify-content-md-center">
         
  {!! $posts->links();!!}

</div>
 	   	 </div>

 	   </div>

@endsection