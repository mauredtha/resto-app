@extends('layouts.mains')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Menu</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
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
                                <th>x</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td class="thumbnail-img" data-th="Image">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('storage/uploads/'.$details['image']) }}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr" data-th="Menu">
                                    <a href="#" style="word-break: break-all;">
                                        {{ $details['name'] }}
                                        <p>Rp. {{number_format($details['price'])}}</p>
                                    </a>
                                </td>
                                <!--<td class="price-pr" data-th="Price">
                                    <p>Rp. {{number_format($details['price'])}}</p>
                                </td>-->
                                <td class="quantity-box" data-th="Quantity">
                                    <p>Rp. {{number_format($details['price'] * $details['quantity'])}}</p>
                                    <input type="number" size="4" value="{{ $details['quantity'] }}" min="0" step="1" class="c-input-text qty text quantity update-cart">
                                </td>
                                <!--<td class="total-pr" data-th="Subtotal">
                                    <p>Rp. {{number_format($details['price'] * $details['quantity'],2,',','.')}}</p>
                                </td>-->
                                <td class="remove-pr remove-from-cart">
                                    <a href="#">
                                <i class="fas fa-times"></i>
                            </a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--<div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <div class="input-group input-group-sm">
                        <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-theme" type="button">Apply Coupon</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6">
                <div class="update-box">
                    <input value="Update Cart" type="submit">
                </div>
            </div>
            
        </div> -->

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                @if(session('cart'))
                    <?php $no = 1; ?>
                    @foreach(session('cart') as $id => $details)
                    <form action="{{ route('orders') }}" method="POST">
                    @csrf
                        <input type="hidden" id="menu_id" name="orders[{{$no}}][menu_id]" value="{{$id}}">
                        <input type="hidden" id="price" name="orders[{{$no}}][price]" value="{{$details['price']}}">
                        <input type="hidden" id="qty" name="orders[{{$no}}][qty]" value="{{$details['quantity']}}">
                        <?php $no++; ?>
                    @endforeach
                    <input type="hidden" id="order_type" name="order_type" value="{{session('categoryOrder')}}">
                @endif
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Cust Name</h4>
                        <div class="ml-auto font-weight-bold"> 
                            <input type="text" name="cust_name" id="cust_name">{{session('categoryOder')}}
                        </div>
                    </div>
                    <hr class="my-1">

                    @if(session('categoryOrder') == 'DINEIN' or session('categoryOrder') == 'dinein') 
                    <div class="d-flex">
                        <h4>Table No</h4>
                        <div class="ml-auto font-weight-bold">
                            <input type="text" name="table_no" id="table_no">
                        </div>
                    </div>
                    @endif
                    <div class="d-flex">
                        <h4>Payment Type</h4>
                        <div class="ml-auto font-weight-bold">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="payment_type" id="typeKASIR" value="KASIR" >KASIR
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="payment_type" id="typeQRIS" value="QRIS" >QRIS
                                </label>
                            </div>
                        </div>
                    </div>
                   
                    <div class="qris" id="payment_typeQRIS" style="display:none">
                        <div class="ml-auto font-weight-bold text-center">
                        {!! QrCode::size(300)->generate($total) !!}
                        </div>
                    </div>
                     <!--<div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>-->
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <input type="hidden" id="total" name="total" value="{{$total}}">
                        <div class="ml-auto h5"> Rp. {{number_format($total)}} </div>
                    </div>
                    <hr> 
                </div>
            </div>
            <div class="col-12 d-flex shopping-box">
                <button class="ml-auto btn hvr-hover text-white" id="next">Order</button>
                <!--<a href="" class="ml-auto btn hvr-hover">Place Order</a>-->
                </form>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->
@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function() {

        document.getElementById("next").disabled = true;

        
        
        $("input[name$='payment_type']").click(function() {
            var test = $(this).val();
            var btn = document.getElementById("next");

            var payment_qris = document.getElementById("typeQRIS").checked;
            var payment_kasir = document.getElementById("typeKASIR").checked;
            var cust_name = $("#cust_name").val();
            var table_no = $("#table_no").val();

            // if(test == 'QRIS'){
            //     btn.innerText= "Finish";
            // }

            $("div.qris").hide();
            $("#payment_type" + test).show();

            if($("#order_type").val() == 'dinein' || $("#order_type").val() == 'DINEIN'){
                if(cust_name != '' && table_no != '' && ((payment_qris != false) || (payment_kasir != false))){
                    document.getElementById("next").disabled = false;
                }
            }else{
                if(cust_name != '' && ((payment_qris != false) || (payment_kasir != false))){
                    document.getElementById("next").disabled = false;
                }
            }
            
        });

        
        

    });
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart', session('categoryOrder')) }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart', session('categoryOrder')) }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection