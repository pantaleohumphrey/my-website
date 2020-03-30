@extends('main')
@section('title', 'Contact' )
@section('content')

 <div class="row justify-content-md-center">
      
          <div class="col-md-5">
               <h2>Contact Me</h2>
               <hr/>
    <form action="{{url('contact')}}" method="POST">
    {{csrf_field()}}
  <div class="form-group">
    <label name="email">Email address</label>
    <input name="email" class="form-control" id="email" >
 
  </div>
  <div class="form-group">
    <label name="subject">Subject</label>
    <input name="subject" class="form-control" id="subject" >
 
  </div>
  <div class="form-group">
     <label name="message">Message</label>
    <textarea name="message" class="form-control" id="message">Type your message here!...</textarea>  
 
  </div>
  
  <button type="submit" class="btn btn-success">Send Message</button>
</form>
    </div>
          <!-- <div class="col-md-3 col-md-offset-1 ">
              <h2>Siderbar</h2>
          </div> -->
      </div>
  @endsection