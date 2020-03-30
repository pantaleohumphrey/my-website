 @extends('main')
 @section('title','create new post')


 @section('content')
 
 
@if(count($errors)>0)
   
   
   @foreach($errors->all() as $error)
   <div class="alert alert-danger" role="alert" style="margin-top: 20px">
   
   {{$error}}

    </div>
   @endforeach
  
  
@endif
 

      <div class="row justify-content-md-center">
    
    <div class="col-md-5">
        <h2>Create New Post</h2><hr/>
    <!--   <form>
  <div class="form-group">
    <label for="email">Title</label>
    <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
 
  </div>
  <div class="form-group">
     <label for="subject">Message</label>
    <textarea name="subject" class="form-control" id="subject">Type your message here!...</textarea>  
 
  </div>
  
  <button type="submit" class="btn btn-success">Send Message</button>
</form> -->
  {!! Form::open(['route' => 'posts.store']) !!}
     {{Form::label('title','Title:')}}
     {{Form::text('title',null,array('class'=>'form-control'))}}

      {{Form::label('category','Category:')}}
      <select class="form-control" name="category_id">
        @foreach($categories as $category)  
        <option value="{{$category->id}}"> {{$category->name}}</option>
        @endforeach
      </select>

       {{Form::label('tags','Tags:')}}
      <select class="form-control select-mult" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)  
        <option value="{{$tag->id}}"> {{$tag->name}}</option>
        @endforeach
      </select>


     {{Form::label('body',"Post Body")}}
     {{Form::textarea('description',null,array('class'=>'form-control'))}}

      {{Form::submit('Create Post',array('class'=>'btn btn-success', 'style'=>'margin-top:20px'))}}
{!! Form::close() !!}

    </div>
    
    </div>
 @endsection

@section('scripts')
  <script type="text/javascript">
    $('.select-mult').select2();
  </script>
  @endsection