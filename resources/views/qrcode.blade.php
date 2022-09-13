@extends('layouts.buyer')
@section('content')
<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
					<a href="{{route('menus.store')}}"></a>
                    <h1>Scan To See Our Menu</h1>
					{!! QrCode::size(300)->generate('localhost:8000/order-category') !!}
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- End Products  -->
@endsection