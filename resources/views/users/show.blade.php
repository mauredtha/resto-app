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
            <li class="breadcrumb-item active" aria-current="page">Master User</li>
        </ol>
        </nav>
    <h1 class="mb-0 fw-bold">Master User</h1> 

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
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input id="name" name="name" type="text" readonly="readonly"
                                    class="form-control form-control-line" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input id="username" name="username" type="text" readonly="readonly"
                                    class="form-control form-control-line" value="{{$user->username}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input id="email" name="email" type="email" readonly="readonly"
                                    class="form-control form-control-line" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Phone</label>
                            <div class="col-md-12">
                                <input id="phone" name="phone" type="text" readonly="readonly"
                                    class="form-control form-control-line" value="{{$user->phone}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input id="password" name="password" type="password" readonly="readonly"
                                    class="form-control form-control-line" value="{{$user->password}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Role</label>
                            <div class="col-md-12">
                                <input id="role" name="role" type="text" readonly="readonly"
                                    class="form-control form-control-line" value="{{$user->role}}">
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