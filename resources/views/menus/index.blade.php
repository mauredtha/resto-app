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
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <select class="form-select shadow-none">
                                    <option value="0" selected>Monthly</option>
                                    <option value="1">Daily</option>
                                    <option value="2">Weekly</option>
                                    <option value="3">Yearly</option>
                                </select>
                            </div>
                            <div class="ms-auto">
                                <div class="text-end upgrade-btn">
                                    <a href="{{ route('menus.create') }}" class="btn btn-primary text-white"
                                        target="_self">Add Menu</a>
                                </div>
                            </div>
                        </div>
                        <!-- title -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">Category</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">Pict</th>
                                        <th class="border-top-0">Price</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($data['menus']) > 0) { ?>
                                    @foreach ($data['menus'] as $key => $value)
                                    <tr>
                                        <td>{{++$data['i']}}</td>
                                        <td>{{$value->category_id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->description}}</td>
                                        <td>{{$value->pict}}</td>
                                        <td>{{$value->price}}</td>
                                        <td>{{$value->status}}</td>
                                        <td>
                                        <form action="{{ route('menus.destroy',$value->id) }}" method="POST">
   
                                            <a class="btn btn-info text-white" href="{{ route('menus.show',$value->id) }}">Show</a>

                                            <a class="btn btn-primary text-white" href="{{ route('menus.edit',$value->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                                        </form>
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
        {{ $data['menus']->links() }}
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