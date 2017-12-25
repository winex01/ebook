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
            
            <li class="@active('/', 'active') @active('book/*', 'active')">
              <a href="{{ route('index') }}">
                <i class="fa fa-home"></i>
                Home
              </a>
            </li>
            
{{--             <li class="@active('book-lists', 'active')">
              <a href="{{ route('book.lists') }}">
                <i class="fa fa-list"></i>
                Book List
              </a>
            </li> --}}

            
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            

            @if (Auth::guard('web')->check() || Auth::guard('admin')->check())
              {{-- authenticated --}}
               @if (Auth::guard('web')->check())
                  <li>
                      <a href="{{ route('home') }}">
                        <i class="fa fa-user"></i>
                          {{ ucwords(Auth::user()->name) }}
                      </a>
                  </li>
               @endif

               @if (Auth::guard('admin')->check())
                  <li>
                      <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-user"></i>
                          Administrator
                      </a>
                  </li>
               @endif
            @else
              {{-- not authenticated --}}
              <li class="@active('login', 'active') @active('admin/login', 'active')">
                  <a href="{{ url('login') }}">
                    <i class="fa fa-sign-in"></i>
                    Signin 
                  </a>
              </li>
              
              {{-- <li class="@active('register', 'active')">
                  <a href="{{ url('register') }}">
                    <i class="fa fa-user"></i>
                    Signup 
                  </a>
              </li> --}}
            @endif

          </ul>
        </div>
        <!-- /.navbar-custom-menu -->

      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

{{-- @if (Auth::guard('web')->check())
  <p class="text-success">You are logged in as <strong>USER!</strong></p>
@else
  <p class="text-danger">You are logged out as <strong>USER!</strong></p>
@endif

@if (Auth::guard('admin')->check())
  <p class="text-success">You are logged in as <strong>ADMIN!</strong></p>
@else
  <p class="text-danger">You are logged out as <strong>ADMIN!</strong></p>
@endif --}}