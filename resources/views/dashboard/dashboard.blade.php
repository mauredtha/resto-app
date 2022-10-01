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
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
        </nav>
    <h1 class="mb-0 fw-bold">Dashboard</h1> 

    </li>
</ul>
@endsection
@section('sidebar')
 <!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-profile.html" aria-expanded="false"><i
                            class="mdi mdi-account-network"></i><span class="hide-menu">Users</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="table-basic.html" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span
                            class="hide-menu">Pembayaran Kasir</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="icon-material.html" aria-expanded="false"><i class="mdi mdi-qrcode-scan"></i><span
                            class="hide-menu">Pembayaran QRIS</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="starter-kit.html" aria-expanded="false"><i class="mdi mdi-food"></i><span
                            class="hide-menu">Menu</span></a></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
@endsection
@section('content')
<div class="page-wrapper">
    
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Total sales in a week</h4>
                            </div>
                        </div>
                        <div class="chart-container" style="height: 350px;">
                        <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Sales Today</h4>
                        <div class="mt-5 pb-3 d-flex align-items-center">
                            <span class="btn btn-primary btn-circle d-flex align-items-center">
                                <i class="mdi mdi-cart-outline fs-4" ></i>
                            </span>
                            <div class="ms-3">
                                <font size="7" color="black" class="mb-0 fw-bold">{{$data[0]}}</font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
</div>

<script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#bar-chart");

      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Total Sales",
            data: cData.data,
            backgroundColor: [
              "#6495ED",
              "#6495ED",
              "#6495ED",
              "#6495ED",
              "#6495ED",
              "#6495ED",
              "#6495ED",
            ],
            borderColor: [
              "#1E90FF",
              "#1E90FF",
              "#1E90FF",
              "#1E90FF",
              "#1E90FF",
              "#1E90FF",
              "#1E90FF",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };

      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };

      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });

  });
</script>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection