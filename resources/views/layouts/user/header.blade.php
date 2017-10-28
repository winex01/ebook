<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Electronic</b>Book</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li>
              <a href="{{ route('user.logout') }}"><i class="fa fa-sign-out"></i> Logout </a>            
          </li>

          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

          </li>
        </ul>
      </div>
    </nav>
  </header>