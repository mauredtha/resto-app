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
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Total sales in a week</h4>
                            </div>
                        </div>
                        <div class="amp-pxl mt-4" style="height: 350px;" id="bar-chart">
                            <div class="chartist-tooltip"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total sales today</h4>
                        <div class="mt-5 pb-3 d-flex align-items-center">
                            <span class="btn btn-primary btn-circle d-flex align-items-center">
                                <i class="mdi mdi-cart-outline fs-4" ></i>
                            </span>
                            <div class="ms-3">
                            <font size="7" color="black" class="mb-0 fw-bold">{{$chart_day}}</font>
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
@endsection
@section('scripts')
<script>
$(function () {
  "use strict";
  // ==============================================================
  // Newsletter
  // ==============================================================

  var cData = JSON.parse(`<?php echo $chart_data; ?>`);

  var chart2 = new Chartist.Bar(
    ".amp-pxl",
    {
      labels: cData.label,
      series: [
        cData.data
      ],
    },
    {
      axisX: {
        // On the x-axis start means top and end means bottom
        position: "end",
        showGrid: false,
      },
      axisY: {
        // On the y-axis start means left and end means right
        position: "start",
      },
    //   high: "20",
    //   low: "0",
      plugins: [Chartist.plugins.tooltip()],
    }
  );

  var chart = [chart2];
});

</script>

<!-- <script>
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
</script> -->
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection