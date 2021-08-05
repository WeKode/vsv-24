<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- pace-progress -->
    <link rel="stylesheet" href="{{asset('assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css')}}">
    @stack('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- adminlte-->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">

    <style>
        .upload {
            overflow-x: hidden;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.layouts.partials.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- pace-progress -->
<script src="{{asset('assets/plugins/pace-progress/pace.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>

<script>

    let Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });


    @if(session()->has('success'))
    Toast.fire({
        icon: 'success',
        title: '{{__('labels.success')}}',
        text: '{{session()->get('success')}}'
    })
    @endif

    @if(session()->has('error'))
        Toast.fire({
        icon: 'error',
        title: '{{__('labels.error')}}',
        text: '{{session()->get('error')}}'
        })
    @endif

</script>

@stack('js')

</body>
</html>
