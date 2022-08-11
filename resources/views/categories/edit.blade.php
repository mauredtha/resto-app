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
            <li class="breadcrumb-item active" aria-current="page">Master Categories</li>
        </ol>
        </nav>
    <h1 class="mb-0 fw-bold">Master Categories</h1> 

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
                    <form class="form-horizontal form-material mx-2" action="{{ route('categories.update',$category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Category Name</label>
                            <div class="col-md-12">
                                <input id="name" name="name" type="text" placeholder="Beverages"
                                    class="form-control form-control-line" value="{{ $category->name }}">
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