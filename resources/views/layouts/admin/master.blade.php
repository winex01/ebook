@include('layouts.header')

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('layouts.admin.header')

  <!-- Left side column. contains the sidebar -->
  @include('layouts.admin.sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      {{-- content --}}
        @yield('content')
      {{-- end content --}}

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    @include('layouts.footer')
  </footer>

  <!-- Control Sidebar -->
  @include('layouts.admin.sidebar-right')
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  
@include('layouts.scripts')

@yield('script')
  
</body>
</html>
