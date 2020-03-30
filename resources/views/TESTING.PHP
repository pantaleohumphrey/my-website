<body>
   <h1>Heading only</h1>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="{{Request::is('/') ? ' active': ''}}">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="{{Request::is('about') ? 'active': ''}}">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="{{Request::is('contact') ? 'active': ''}}">
        <a class="nav-link" href="/contact">Contact</a>
      </li>
      
    </ul>
    <ul class="nav navbar-right navbar-nav ">
     @if(Auth::check())
        <li class=" dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Hello {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
          <a class="dropdown-item" href="{{route('category.index')}}">Category</a>
           <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
        </div>
      </li>
      @else
      <a class="nav-link " href="{{route('login')}}"  role="button"  aria-haspopup="true" aria-expanded="false"> Login<a>

       @endif
    </ul>
   
  </div>
</nav>


<!-- end of the navigation -->

<!-- containver body -->
  <div class="container"> 
      
      @yield('content')

      <p class="text-center">Copyright @humphrey pantaleo</p>
      <hr/>
   </div> 
<!-- endcontainver body -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!-- 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->

   <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

      {!!Html::script('js/pasley.min.js')!!}
      {!!Html::script('js/select2.min.js')!!}
      {!!Html::script('js/bootstrap.bundle.js')!!}
      {!!Html::script('js/bootstrap.js')!!}
      @yield('scripts')
    <script>
      
    </script>
  </body>
