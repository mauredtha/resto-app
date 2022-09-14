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
                    <form class="form-horizontal form-material mx-2" action="{{ route('users.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control form-control-line" name="name" id="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="jo_doe"
                                    class="form-control form-control-line" name="username" id="username" value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="johnathan@admin.com"
                                    class="form-control form-control-line" name="email"
                                    id="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password"
                                    class="form-control form-control-line" name="password" id="password" value="{{$user->password}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Re-Password</label>
                            <div class="col-md-12">
                                <input type="password" 
                                    class="form-control form-control-line" name="password_confirmation" id="password_confirmation" value="{{$user->password}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="123 456 7890"
                                    class="form-control form-control-line" name="phone" id="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Role</label>
                            <div class="col-md-12">
                                <select class="form-select shadow-none form-control-line" name="role" id="role">
                                    <option value="">Pilih Role</option>
                                    @foreach ($roles as $key => $value)
                                    <option value="{{$value}}" {{ $value == $user->role ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Status</label>
                            <div class="form-check form-switch">

                                <input class="form-check-input" type="checkbox" @if($user->status == 'on') id="flexSwitchCheckChecked" checked @else id="flexSwitchCheckDefault" @endif  name="status" value="{{$user->status}}">

                            </div>
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