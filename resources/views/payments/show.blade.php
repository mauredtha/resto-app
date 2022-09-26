@extends('layouts.buyer')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            
            @if($data['orders'][0]->payment_type == 'KASIR')
                <h2>Berhasil Order, Silakan Melakukan Pembayaran Ke Kasir Sebesar Rp. {{number_format($data['orders'][0]->total)}}</h2>
            @else
                <h2>Berhasil Order, Anda Telah Melakukan Pembayaran Sebesar Rp. {{number_format($data['orders'][0]->total)}} Melalui QRIS</h2>
            @endif
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Menu Name</th>
                                <!--<th>Price</th>-->
                                <th>Quantity</th>
                                <!--<th>Total</th>-->
                            </tr>
                        </thead>
                        <tbody>
                        @php $total = 0 @endphp
                        
                            @foreach($data['order_details'] as $id => $details)
                                @php $total += $details['price'] * $details['qty'] @endphp
                            <tr data-id="{{ $id }}">
                                <td class="thumbnail-img" data-th="Image">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('storage/uploads/'.$details->pict) }}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr" data-th="Menu">
                                    <a href="#" style="word-break: break-all;">
                                        {{ $details['name'] }}
                                        <p>Rp. {{number_format($details['price'])}}</p>
                                    </a>
                                </td>
                                <td class="quantity-box" data-th="Quantity">
                                    <p>Rp. {{number_format($details['price'] * $details['qty'])}}</p>
                                    {{$details['qty']}}
                                </td>
                                
                            </tr>
                            @endforeach
                        
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Cust Name</h4>
                        <div class="ml-auto font-weight-bold"> 
                            {{$data['orders'][0]->cust_name}}
                        </div>
                    </div>
                    <hr class="my-1">

                    @if($data['orders'][0]->order_type == 'DINEIN' or $data['orders'][0]->order_type == 'dinein') 
                    <div class="d-flex">
                        <h4>Table No</h4>
                        <div class="ml-auto font-weight-bold">
                           {{$data['orders'][0]->table_no}}
                        </div>
                    </div>
                    @endif
                    <div class="d-flex">
                        <h4>Payment Type</h4>
                        <div class="ml-auto font-weight-bold">
                            {{$data['orders'][0]->payment_type}}
                        </div>
                    </div>
                   

                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <input type="hidden" id="total" name="total" value="{{$total}}">
                        <div class="ml-auto h5"> Rp. {{number_format($total)}} </div>
                    </div>
                    <hr> 
                </div>
                <div class="col-12 d-flex shopping-box">
                <a href="{{route('order.category')}}" class="ml-auto btn hvr-hover">Selesai</a>
                </form>
            </div>
            </div>
            
        </div>

    </div>
</div>
<!-- End Cart -->
@endsection
