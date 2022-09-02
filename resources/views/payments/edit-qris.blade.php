@extends('layouts.admin')
@section('breadcrumb')
<ul class="navbar-nav float-start me-auto">
    <!-- ============================================================== -->
    <!-- Breadcrumb -->
    <!-- ============================================================== -->
    <li class="nav-item search-box"> 
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 d-flex align-items-center">
            <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Pembayaran Kasir</li>
        </ol>
        </nav>
    <h1 class="mb-0 fw-bold">Pembayaran Kasir</h1> 

    </li>
</ul>
@endsection

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal form-material mx-2" action="{{ route('qris.update',$payment) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Transaction Date</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control form-control-line" name="transaction_date" id="transaction_date" value="{{$data['orders'][0]->transaction_date}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Cust Name</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control form-control-line" name="cust_name" id="cust_name" value="{{$data['orders'][0]->cust_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Table No</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control form-control-line" name="table_no" id="table_no" value="{{$data['orders'][0]->table_no}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Order Type</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control form-control-line" name="order_type" id="order_type" value="{{$data['orders'][0]->order_type}}">
                            </div>
                        </div>

                        <!--<div class="card">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>TEs</td>
                                    </tr>
                                </table>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="col-md-12"> <h2>Details</h2> </label>
                            <div class="table-responsive">
                            <table class="table mb-0 table-hover align-middle text-nowrap border">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Menu Name</th>
                                        <th class="border-top-0">Quantity</th>
                                        <th class="border-top-0">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach ($data['order_details'] as $key => $value)
                                        @php $total += $value->qty * $value->price @endphp
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->qty}}</td>
                                        <td>Rp. {{number_format($value->qty * $value->price)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <form action="">
                                    <tr>
                                        <td colspan="2" style="text-align:right;">Grand Total</td>
                                        <td>
                                        Rp. {{number_format($total)}}
                                        <input type="hidden" name="grand_total" id="grand_total" value="{{$total}}" />
                                        </td>
                                    </tr>
                                    </form>
                                </tfoot>
                            </table>
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection
@section('scripts')
<script type="text/javascript">

    $(document).ready(function() {
        
        $("input[name$='payment_method']").click(function() {
            var test = $(this).val();
            
            $("tr.tunai").hide();
            $("#bayar" + test).show();
            $("#kembali" + test).show();
        });

        $("#bayarTUNAI").change(function (e) {
            e.preventDefault();
    
            var total = $("#grand_total").val();
            var bayar = $("#jml_bayar").val();
            var kembali = bayar - total;
            $("#kembalian").val(kembali);
            
    
        });

    });
  
</script>
@endsection