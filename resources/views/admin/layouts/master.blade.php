<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <base href="{{ asset('') }}">
  <!-- Custom fonts for this template-->
  <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="assets/admin/js/typeahead.jquery.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> --}}
  <link href="assets/admin/css/font-sbadmin.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/admin/css/toastr.css">
  <link rel="stylesheet" href="assets/admin/css/dev.css">
  {{-- <link rel="stylesheet" href="assets/admin/css/login.css"> --}}
  <link rel="stylesheet" href="assets/admin/css/animate.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <link href="{{ asset('css/dataTables.bootstrap.css') }}">
  <link href="{{ asset('css/bootstrap.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    @include('admin.layouts.menu')
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        @include('admin.layouts.header')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
          <!-- Page Heading -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
    @include('admin.layouts.footer')

</body>

</html>
