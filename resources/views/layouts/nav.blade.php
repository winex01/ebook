  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('index') }}" class="navbar-brand"><b>E</b>-Book Archives</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li class="@active('/', 'active')">
              <a href="{{ route('index') }}">
                <i class="fa fa-home"></i>
                Home
              </a>
            </li>
            
            <li class="@active('book-lists', 'active')">
              <a href="{{ route('book.lists') }}">
                <i class="fa fa-list"></i>
                Book List
              </a>
            </li>

            <li class="@active('students', 'active')">
              <a href="{{ route('students') }}">
                <i class="fa fa-users"></i>
                Student's
              </a>
            </li>

            <li class="@active('committees', 'active')">
              <a href="{{ route('committees') }}">
                <i class="fa fa-users"></i>
                Committee's
              </a>
            </li>
            
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <li class="@active('login', 'active')">
                <a href="{{ url('login') }}">
                  <i class="fa fa-sign-in"></i>
                  Signin 
                </a>
            </li>
            
            <li class="@active('register', 'active')">
                <a href="{{ url('register') }}">
                  <i class="fa fa-user"></i>
                  Signup 
                </a>
            </li>
         
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->

      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>