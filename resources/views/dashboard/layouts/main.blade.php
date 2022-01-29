<!doctype html>
<html lang="en">

<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/animate.min.css')}}">

<!-- VENDOR CSS Taskboard-->
<link rel="stylesheet" href="{{ asset('assets/vendor/nestable/jquery-nestable.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">


<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/main.css')}}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/color_skins.css')}}">

<livewire:styles/>
<livewire:scripts/>

<style>
.videowrapper 
{ 
    float: none; 
    clear: both; 
    width: 100%; 
    position: relative; 
    padding-bottom: 50%; 
    padding-top: 25px; 
    height: 0; 
} 
.videowrapper iframe 
{ 
    position: absolute; 
    top: 0; 
    left: 0;
    width: 100%; 
    height: 100%; 
}
</style>


</head>
<body class="theme-purple" style="background-color: #e6cdf8">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <!-- <div class="m-t-30"><img src="{{asset('assets/images/logo-icon.svg')}}" width="48" height="48" alt="Lentera"></div> -->
        <p>LENTERA TEKNOLOGI</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

@include('dashboard.partial.navbar')

@include('dashboard.partial.menu')

@yield('container')


</div>

<!-- Javascript -->
<script src="{{asset('dashboard/assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{asset('dashboard/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/js/index.js')}}"></script>

<script src="{{asset('assets/vendor/nestable/jquery.nestable.js')}}"></script> <!-- Jquery Nestable -->
<script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js --> 
<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script><!-- bootstrap datepicker Plugin Js --> 

<script src="{{asset('assets/js/pages/ui/sortable-nestable.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/dialogs.js')}}"></script>
</body>
</html>
