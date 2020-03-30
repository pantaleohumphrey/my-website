@extends('main')
@section('title', 'All Tags')

@section('content')

@if(Session::has('success'))
   <div class="alert alert-success" role="alert" style="margin-top: 20px">
      {{Session::get('success')}}
   </div>
 
@endif
 <div class="row">
   <div class="col-md-10">
     <h2 style="margin-top: 20px">All Tags</h2>
   </div>
   
    </div>
   <!-- <div class="col-md-12">
     <hr>
   </div> -->
     <!--endof row the top one-->

     <div class="row">
       <div class="col-md-9">
         <table class="table table-striped">

<thead>
<tr>
<th>#</th>
<th> Tag Name</th>
<th> Posts Linked</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>
<!-- <th>Create At</th> -->
</tr>
</thead>
<tbody>
 @foreach($tags as $tag)
<tr>
<td>{{$tag->id}}</td>
<td>{{$tag->name}}</td>
<td>{{$tag->post()->count()}}</td>
<td>{{$tag->created_at}}</td>
<td>{{$tag->updated_at}}</td>

<td>

     {!! Html:: linkRoute('tags.edit', 'Edit', array($tag->id),array('class'=>'btn btn-primary'))!!}

</td>
</tr>
@endforeach
</tbody>
</table>
 <!-- <div class="row justify-content-md-center">
         

</div> -->
       </div>
<div class="col-md-3">
   {!!Form:: open(['route'=>'tags.store'])!!}
   
    {{Form::label('name','Tag:')}}
    {{Form::text('name',null, ['class'=>'form-control'])}}
    {{Form::submit('Save Tag',array('class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px'))}}   
    {!! Form::close() !!}
   </div>
     </div>

@endsection