@extends('layouts.mains')
@section('content')
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
            <p><a class="btn btn-default" href="{{ route('add.to.cart', $menu->id) }}" role="button"> Rp. {{number_format($menu->price,2,',','.')}} Add to cart &raquo;</a></p>
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
@endsection