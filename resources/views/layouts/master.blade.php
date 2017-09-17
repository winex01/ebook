@include('layouts.header')

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  @include('layouts.nav')

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Electronic Book Archive
          <small>Version 1.0</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">

              <div class="row">

                  <div class="col-lg-9 col-md-9">
                  
                      @yield('content')
                      
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <h4>Top Tags</h4>
                      <ol>
                          <li><a href="#"> Arduino</a></li>
                          <li><a href="#"> Web</a></li>
                          <li><a href="#"> Management</a></li>
                          <li><a href="#"> SQL</a></li>
                          <li><a href="#"> Visual Studio</a></li>
                          <li><a href="#"> Windows Form</a></li>
                          <li><a href="#"> C#</a></li>
                          <li><a href="#"> Java</a></li>
                          <li><a href="#"> Game Dev</a></li>
                          <li><a href="#"> Networking</a></li>
                      </ol>
                                
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
