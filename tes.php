<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="themes/assets/ico/favicon.ico">
    <title>2 Fat Guys</title>
    @include('partials.main-styles')
    
  </head>
<!-- NAVBAR
================================================== -->
  <body>
  @include('partials.main-navbar')
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">Resto App</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="#tablebooking">Table Booking</a></li>
				        <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Indina <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">DRINKS</a></li>
                    <li><a href="#">STARTERS</a></li>
                    <li><a href="#">TANDOORI - CLAY OVEN - DISHES</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">SEAFOOD MAIN COURSES</li>
                    <li><a href="#">CHICKEN MAIN COURSES</a></li>
                    <li><a href="#">LAMB MAIN COURSES</a></li>
                    <li><a href="#">RICE/BREDS</a></li>
                    <li><a href="#">ACCOMPANIMENTS</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

  <br> <br> <br> <br> <br>
	
	<div class="highlightSection">
	<div class="container">
	<div class="row">
    @foreach ($specialMenu as $key => $val)
		<div class="col-lg-4">
		<div class="media">
			<a href="menu/"><img src="{{ asset('storage/uploads/'.$val->pict) }}" alt="{{$val->name}}" width="50%" height="20%"> </a>
			<h3 class="media-heading text-primary-theme">{{$val->name}}</h3>
			<p>{{$val->description}}</p>
		</div>
		</div>
    @endforeach
	</div>
	</div>
	</div>
	
	
	
	
	
	@foreach ($data['categories'] as $cat => $category)
	 <div class="container marketing">
    <h2 class="itemsTitle">{{$category->name}}</h2>
	  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-inner">
        <?php $i = 0; ?>
        @foreach ($category->menus as $m => $menu)
        @if ($i % 3 === 0 )
        <div class="item <?php if($m == 0) : ?>active <?php endif; ?>">
         <div class="row">
        @endif

        
        <div class="col-lg-4">
          <img src="{{ asset('storage/uploads/'.$menu->pict) }}" alt="{{$menu->name}}">
          <h4>{{$menu->name}}</h4>
          <h5>{{$menu->description}}</h5>
          <p><a class="btn btn-default" href="#" role="button"> Rp. {{number_format($menu->price,2,',','.')}} Add to cart &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
      @if ( $i % 3 === 2 )
      </div><!-- /.row -->
      </div>
      @endif
      <?php $i++; ?>
      @endforeach

      @if ( $i % 3 !== 0 )
      </div><!-- /.row -->
      </div>
      @endif

        
      </div>
      <a class="left carousel-control" href="#myCarousel1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
	</div>
  @endforeach


	<div class="introSection">
		<div class="container">
		<div class="row">
		<div class="col-lg-5">
		<h3>Welcome to restaurent</h3>
		<p>
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
		text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>
		It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
		and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
		</p>
		</div>
		
		<div class="col-lg-4">
		<h3>Welcome to restaurent</h3>
		<p>
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
		text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>
		
		</p>
		
		</div>
		
		<div class="col-lg-3">
		<h3>Welcome to restaurent</h3>
		<p>
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
		text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		
		</p>
		
		</div>
		
		</div>
		</div>
	</div>


   <div class="container marketing">
   <div id="myCarousel4" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-inner">
      <div class="item active">
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Fish and Chips <span class="text-muted">It's very very testy</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img src="themes/assets/images/fish-and-chips.png" alt="Fish and Chips">
        </div>
      </div>
      </div>

      
	<div class="item">
      <div class="row featurette">
        <div class="col-md-5">
          <img src="themes/assets/images/burger.png" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Oh yeah, very nice Burger. <span class="text-muted">Delicious.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
      </div>
      </div>


	<div class="item">
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Try yourself <span class="text-muted">Testy</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
		  <img class="img-circle" src="themes/assets/images/drinks.png" alt="Generic placeholder image">
        </div>
      </div>
      </div>
	   </div>
    </div><!-- /.carousel -->	  
    </div><!-- /.container -->
      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
		<div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		</div>
      </footer>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="themes/dist/js/bootstrap.min.js"></script>
    <script src="themes/assets/js/holder.js"></script>
  </body>
</html>
