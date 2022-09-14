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
                    <form class="form-horizontal form-material mx-2" action="{{ route('menus.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                            <label class="col-md-12">Category</label>
                            <div class="col-md-12">
                                <select class="form-select shadow-none form-control-line" name="category_id" id="category_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $key => $value)
                                    <option value="{{$value->id}}" {{ $value->id == $menu->category_id ? 'selected' : '' }} >{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Name"
                                    class="form-control form-control-line" name="name"
                                    id="name" value="{{$menu->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line" name="description"
                                    id="description">{{$menu->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Price</label>
                            <div class="col-md-12">
                                <input type="text" name="price" id="price" class="form-control form-control-line" value="{{$menu->price}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pict</label>
                            <div class="col-md-12">
                                <input type="file" name="pict" id="pict" class="form-control form-control-line" value="{{$menu->pict}}">
                            </div>
                            <img src="{{ asset('storage/uploads/'.$menu->pict) }}" alt="" title="" id="pict" name="pict" class="form-control form-control-line" width="30%" height="30%"/>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-md-12">Status</label>
                        <div class="form-check form-switch">

                            <input class="form-check-input" type="checkbox" @if($menu->status == 'on') id="flexSwitchCheckChecked" checked @else id="flexSwitchCheckDefault" @endif  name="status" value="{{$menu->status}}">

                        </div>
                        <br>
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
        $("input[name$='status']").click(function() {
            var status = $("input[name$='status']").val();
            
            if(status == 'off'){
                $("input[name$='status']").attr('value','on');
            }else{
                $("input[name$='status']").attr('value','off');
            }
        })
    });
</script>
@endsection