@include('layouts.header')

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  @include('layouts.guest.nav')

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

      @include('layouts.version')

      <!-- Main content -->
      <section class="content">

              <div class="row">

                  <div class="col-lg-9 col-md-9">
                  
                      @yield('content')
                      
                  </div>
                  <div class="col-lg-3 col-md-3">
                      {{-- most viewed --}}
                      @include('layouts.guest.mostViewed', compact($mostViewed, $mostBookmark, $mostDownload))
                  </div>
              </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="container">
      @include('layouts.footer')
    </div>
    <!-- /.container -->
  </footer>

</div>
<!-- ./wrapper -->


@include('layouts.scripts')

@yield('script')

</body>
</html>
