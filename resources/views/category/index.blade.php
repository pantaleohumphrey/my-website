@extends('main')
@section('title', 'All Categories')

@section('content')

@if(Session::has('success'))
   <div class="alert alert-success" role="alert" style="margin-top: 20px">
      {{Session::get('success')}}
   </div>
 
@endif
 <div class="row">
 	 <div class="col-md-10">
 	 	 <h2 style="margin-top: 20px">All Categories</h2>
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
<th>Name</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>
<!-- <th>Create At</th> -->
</tr>
</thead>
<tbody>
 @foreach($categories as $category)
<tr>
<td>{{$category->id}}</td>
<td>{{$category->name}}</td>
<td>{{$category->created_at}}</td>
<td>{{$category->updated_at}}</td>
<td>

     {!! Html:: linkRoute('category.edit', 'Edit', array($category->id),array('class'=>'btn btn-primary'))!!}

</td>
</tr>
@endforeach
</tbody>
</table>
          <div class="row justify-content-md-center">
         

</div>
 	   	 </div>
<div class="col-md-3">
   {!!Form:: open(['route'=>'category.store'])!!}
   
    {{Form::label('name','Category:')}}
    {{Form::text('name',null, ['class'=>'form-control'])}}
    {{Form::submit('Save Category',array('class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px'))}}   
    {!! Form::close() !!}
   </div>
 	   </div>

@endsection