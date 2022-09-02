<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Resto App</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/frontend/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/frontend/images/apple-touch-icon.png">
    @include('partials.mains-styles')

</head>

<body>
    @include('partials.buyer-header')

    @if(session('success'))
        <div class="alert alert-success text-center">
          {{ session('success') }}
        </div> 
    @endif
    @yield('content')

    @include('partials.buyer-footer')

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    @include('partials.mains-scripts')
    @yield('scripts')
</body>

</html>