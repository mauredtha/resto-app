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
            <li class="breadcrumb-item active" aria-current="page">Master Menu</li>
        </ol>
        </nav>
    <h1 class="mb-0 fw-bold">Master Menu</h1> 

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
                    
                        <div class="form-group">
                            <label class="col-md-12">Menu Name</label>
                            <div class="col-md-12">
                                <input id="name" name="name" type="text" readonly="readonly"
                                    class="form-control form-control-line" value="{{$menu->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="description" id="description" rows="5" value="{{$menu->description}}" readonly="readonly">{{$menu->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Price</label>
                            <div class="col-md-12">
                                <input id="price" name="price" type="text" readonly="readonly"
                                    class="form-control form-control-line" value="{{$menu->price}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Pict</label>
                            <div class="col-md-12">
                            <img src="{{ asset('storage/uploads/'.$menu->pict) }}" alt="" title="" id="pict" name="pict" class="form-control form-control-line"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Status</label>
                            <div class="col-md-12">
                                <input id="status" name="status" type="text" readonly="readonly"
                                    class="form-control form-control-line" value="{{$menu->status}}">
                            </div>
                        </div>
        
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