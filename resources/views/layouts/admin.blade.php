<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a href="/dangxuat">Đăng xuất</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <span class="brand-text font-weight-bold">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column mt-3" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item mt-2 ml-2">
            <a href="/admin/sanpham/danhsach"><i class="fab fa-product-hunt"></i>  Quản lý sản phẩm</a>
          </li>
          <li class="nav-item mt-2 ml-2">
            <a href="/admin/nhacungcap/danhsach"><i class="fas fa-parachute-box"></i>  Quản lý nhà cung cấp</a>
          </li>
          <li class="nav-item mt-2 ml-2">
            <a href="/admin/donhang/danhsach"><i class="fas fa-list"></i>  Quản lý đơn hàng</a>
          </li>
          <li class="nav-item mt-2 ml-2">
            <a href="/admin/quangcao"><i class="fab fa-buysellads"></i>  Quản lý quảng cáo</a>
          </li>
          <li class="nav-item mt-2 ml-2">
            <a href="/admin/news/danhsach"><i class="far fa-newspaper"></i> Quản lý bài đăng</a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/adminlte.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
