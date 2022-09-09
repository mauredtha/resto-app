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
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <select class="form-select" name="status">
                                <option value="">All Status</option>
                                <option value="PAID" selected>PAID</option>
                                <option value="UNPAID">UNPAID</option>
                                </select>
                            </div>
                            <div class=" col">
                                <input class="form-control" type="text" name="q" placeholder="Search customer name..." />
                            </div>
                            <div class=" col">
                                <input class="form-control" type="text" name="datefilter" id="start_date" placeholder="Select Start & End Date" />
                            </div>
                            <div class="col">
                                <button class="btn btn-success">Search</button>
                            </div>
                            <div class="ms-auto">
                                @if(in_array(auth()->user()->role, ['ADMIN']))
                                <div class="text-end upgrade-btn">
                                    <a href="{{ route('menus.create') }}" class="btn btn-primary text-white"
                                        target="_self">Add Menu</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- title -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No Transaksi</th>
                                        <th class="border-top-0">Tgl</th>
                                        <th class="border-top-0">Nama</th>
                                        <th class="border-top-0">No Meja</th>
                                        <th class="border-top-0">Total Pembayaran</th>
                                        <th class="border-top-0">Metode Pembayaran</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($data['orders']) > 0) { ?>
                                    <?php
                                        $i = $data['orders']->firstItem();
                                    ?>
                                    @foreach ($data['orders'] as $key => $value)
                                    <tr>
                                        <td>{{ $value->trx_no }}</td>
                                        <td>{{$value->transaction_date}}</td>
                                        <td>{{$value->cust_name}}</td>
                                        <td>
                                            @if($value->table_no) 
                                                {{$value->table_no}}
                                            @else 0 @endif
                                        </td>
                                        <td>{{$value->total}}</td>
                                        <td>{{$value->payment_method}}</td>
                                        <td>{{$value->status}}</td>
                                        <td>
                                        <a class="btn btn-info text-white" href="{{ route('invoice',$value->id) }}">Print</a>

                                        @if ($value->status == 'UNPAID')
                                        <a class="btn btn-primary text-white" href="{{ route('payments.edit', $value->id) }}">Edit</a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php } else { ?>
                                    <tr>
                                        <td colspan="10"><p align="center">Belum Ada Data, Silakan Melakukan Penambahan Data</p></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $data['orders']->links() }}
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name="datefilter"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>
@endsection
