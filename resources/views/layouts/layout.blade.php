<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Simple CRM</title>

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">

    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{ asset('dashboard/css/style.css')}}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('dashboard/css/examples.css')}}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/@coreui/chartjs/css/coreui-chartjs.css')}}" rel="stylesheet">
</head>
<body>

{{--    @include('layouts.header')--}}

    {{--SIDBAR--}}
    @yield('sidebar')

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')

        {{--CONTENT--}}
        @yield('content')
    </div>

<!-- Icons-->
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script>
    <!-- CoreUI and necessary plugins-->
<script src="{{ asset('dashboard/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
<script src="{{ asset('dashboard/vendors/simplebar/js/simplebar.min.js')}}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{ asset('dashboard/vendors/chart.js/js/chart.min.js')}}"></script>
<script src="{{ asset('dashboard/vendors/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
<script src="{{ asset('dashboard/vendors/@coreui/utils/js/coreui-utils.js')}}"></script>
<script src="{{ asset('dashboard/js/main.js')}}"></script>
<script>
</script>

</body>
</html>
