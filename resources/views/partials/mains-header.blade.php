<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
                <a class="navbar-brand" href="index.html"><img src="/frontend/images/logo-fatguys.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            @php $totalQty = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $totalQty += $details['quantity'] @endphp
                            @endforeach
                            <span class="badge">{{ $totalQty }}</span>
                            <p>My Cart</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                @php $total = 0 @endphp
                @foreach((array) session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach

                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    <li>
                        <a href="#" class="photo"><img src="{{ asset('storage/uploads/'.$details['image']) }}" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">{{ $details['name'] }}</a></h6>
                        <p>{{ $details['quantity'] }}x - <span class="price">Rp. {{number_format($details['price'])}}</span></p>
                    </li>
                    @endforeach
                    @endif

                    <li class="total">
                        <a href="{{ route('cart', session('categoryOrder')) }}" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        <span class="float-right"><strong>Total</strong>: Rp.{{number_format($total)}}</span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->