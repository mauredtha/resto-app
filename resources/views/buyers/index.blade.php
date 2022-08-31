@extends('layouts.buyer')
@section('content')
<div class="box-add-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>DINE IN OR TAKE AWAY</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <?php $type = "DINEIN"; ?>
                    <a href="{{route('resto', $type)}}">
                    <img class="img-fluid" src="/assets/images/dinein.png" alt="" width="570px" heigth="326px" />
                    </a>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <?php $type = "TAKEAWAY"; ?>
                    <a href="{{route('resto', $type)}}">
                    <img class="img-fluid" src="/assets/images/takeaway.png" alt="" width="570px" heigth="326px" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection