@extends('main')

@section('title', 'Welcome' )
@section('content')

@if(Session::has('success'))
   <div class="alert alert-success" role="alert" style="margin-top: 20px">
    {{Session::get('success')}}
   </div>
 
@endif
      <div class="row">
          <div class="col-md-8  ">
          @foreach($posts as $post)
               <div class="post">
               

                   <h5> {{$post->title}}</h5>
                   <p>{{$post->description}} </p>
                   <a href="#" class="btn btn-primary btn-sm">Read More</a>
                    <hr/>
               </div>
               @endforeach
                
          </div>
          <div class="col-md-3 col-md-offset-1 ">
              <h2>Siderbar</h2>
          </div>
      </div>
@endsection
<!-- endcontainver body -->
   