@extends('layouts.mains')
@section('content')
<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Our Menu</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <!--<button class="active" data-filter="*">All</button>-->
                    @foreach ($data['categories'] as $cat => $category)
                        
                        <button data-filter=".{{$category->name}}">{{$category->name}}</button>
                        <!--<button data-filter=".best-seller">Best seller</button>-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
        @foreach ($data['categories'] as $cat => $category)
            @foreach ($category->menus as $m => $menu)
            <div class="col-lg-3 col-md-6 special-grid {{$category->name}}">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <!--<div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>-->
                        <img src="{{ asset('storage/uploads/'.$menu->pict) }}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                            </ul>
                            <a class="cart" href="{{ route('add.to.cart', [session('categoryOrder'), $menu->id]) }}">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>{{$menu->name}}</h4>
                        <h3>{{$menu->description}}</h3>
                        <h5>Rp. {{number_format($menu->price,2,',','.')}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach


            

            

            
        </div>
    </div>
</div>
<!-- End Products  -->
@endsection