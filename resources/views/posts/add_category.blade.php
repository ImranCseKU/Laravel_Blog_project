<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/myfontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('public/myfontend/css/clean-blog.min.css')}}" rel="stylesheet">
    <style>
        a:link {
            text-decoration: none;
        }
    </style>

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Master Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('write')}}">Write Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('bloggers') }}">Blogger</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url( {{asset('public/myfontend/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Site By Master Blog</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
                
          <h1 class="font-weight-bold mb-3" style="color:#DCDCDC">Add Category</h1>
          <p>
            <a href="{{route('all.category')}}" class="btn btn-success">All Category</a>
            <a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
          </p>


          <!-- show error message  -->
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form action="{{route('store.category')}}" method="post">
              @csrf
              <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                  <label>Category Name</label>
                  <input type="text" class="form-control" placeholder="Category Name" id="name" name="name">
                  </div>
              </div>
              <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                  <label>Category Status</label>
                  <input type="text" class="form-control" placeholder="Category Status" id="email" name="status">
                  </div>
              </div>
              <br>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('public/myfontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/myfontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


  <!-- Contact Form JavaScript -->
  <script src="{{asset('public/myfontend/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('public/myfontend/js/contact_me.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('public/myfontend/js/clean-blog.min.js')}}"></script>


</body>

</html>
