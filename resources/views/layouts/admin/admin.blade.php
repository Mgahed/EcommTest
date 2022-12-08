<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--    <link rel="icon" href="{{asset('dashboard/images/favicon.ico'}}">--}}

    <title>{{env('APP_NAME')}}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('dashboard/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/skin_color.css')}}">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    @include('layouts.admin.includes.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                @yield('admin')
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.admin.includes.footer')

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{asset('dashboard/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
{{--<script src="{{asset('dashboard/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>--}}
{{--<script src="{{asset('dashboard/assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>--}}
{{--<script src="{{asset('dashboard/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>--}}

<!-- Sunny Admin App -->
<script src="{{asset('dashboard/js/template.js')}}"></script>
<script src="{{asset('dashboard/js/pages/dashboard.js')}}"></script>


</body>
</html>
