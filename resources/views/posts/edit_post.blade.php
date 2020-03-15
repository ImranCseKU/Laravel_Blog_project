<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

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
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
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
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto rerum nisi quisquam fugiat ipsam sapiente iure animi eum soluta consequuntur nobis beatae dolor iusto eos at quos optio, quam porro!</p>
        
          <p>
            <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
            <a href="{{route('all.post')}}" class="btn btn-danger">All Post</a>
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

          <!-- Write a post and save it into  -->
          <form action="{{URL::to('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Post Title</label>
                <input type="text" name="post_title" class="form-control" value="{{$post->title}}" id="name" required>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Category</label>
                <select name="category_id" class="form-control" >
                  @foreach($categories as $category)
                  {
                    <option value="{{$category->id}}" <?php if ( $category->id == $post->category_id) echo "selected"; ?> >{{$category->name}}</option>
                  }
                  @endforeach 
                </select>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Post Image</label>
                <input type="file" name="post_img" class="form-control"> 
                Old image: <img src="{{URL::to('public/'.$post->image )}}" style="height:40px; width: 80px;" alt="img">
                <input type="hidden" name="old_photo" value ="{{$post->image}}">
              </div>
            </div>
            
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Post Details</label>
                <textarea rows="5" name="post_details" class="form-control" placeholder="Details" id="message" required>{{$post->details}}</textarea>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
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
