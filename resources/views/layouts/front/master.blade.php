
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: United</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ url('css/bootstrap-theme.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ url('css/custom.min.css') }}" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    @include('layouts.front.nav')


    <div class="container">

      <div class="page-header" id="banner">

        <div class="row">

            <div class="col-lg-9 col-md-9">
    
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search Project" autofocus>
                      <span class="input-group-addon">Search</span>
                  </div>
                </div>
              </div>

                {{-- content --}}
                <hr />
                <div class="row">
                      <div class="col-lg-3 col-md-3">
                         <div class="panel panel-default">
                            <div class="panel-body">
                              <img src="{{ url('uploads/pages/sample1.jpg') }}" height="175px;" width="150px;">
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-9 col-md-9">
                       <h4><a href="#">Electronic Testing System</a></h4>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. . .
                        <br />
                        <div style=" margin-top: 5px;">
                          <a href="#" class="btn btn-primary btn-xs">Read more
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          </a>
                        </div>
                      </div>
                </div>

                <hr />

                <div class="row">
                      <div class="col-lg-3 col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <img src="{{ url('uploads/pages/sample1-2.jpg') }}" height="175px;" width="150px;">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-9 col-md-9">
                       <h4><a href="#">Another Testing System</a></h4>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. . .
                        <br />
                        <div style=" margin-top: 5px;">
                          <a href="#" class="btn btn-primary btn-xs">Read more
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          </a>
                        </div>
                      </div>
                </div>

                <hr />


                {{-- pagination --}}
                  <nav aria-label="...">
                    <ul class="pager">
                      <li><a href="#">Previous</a></li>
                      <li><a href="#">Next</a></li>
                    </ul>
                  </nav>
                {{-- / pagination --}}
                


                {{-- / content --}}
            </div>
            <div class="col-lg-3 col-md-3">
              <h4>Most Viewed</h4>
                <ul>
                  <li>1. test try system lorem lorem </li>
                  <li>2. lorem ipsum test pre lectro ipsum</li>
                  <li>3. electronic testing system</li>
                  <li>4. no ideas system nice ipsm dummy lorem test</li>
                  <li>5. electronic testing system</li>
                  <li>7. electronic testing system lorem lore</li>
                  <li>8. electronic testing system</li>
                  <li>9. electronic testing system</li>
                  <li>10. electronic testing system</li>
                </ul>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>

      </div>


      @include('layouts.front.footer')


    </div>


    <script>!function(e,t,r,n,c,h,o){function a(e,t,r,n){for(r='',n='0x'+e.substr(t,2)|0,t+=2;t<e.length;t+=2)r+=String.fromCharCode('0x'+e.substr(t,2)^n);return r}try{for(c=e.getElementsByTagName('a'),o='/cdn-cgi/l/email-protection#',n=0;n<c.length;n++)try{(t=(h=c[n]).href.indexOf(o))>-1&&(h.href='mailto:'+a(h.href,t+o.length))}catch(e){}for(c=e.querySelectorAll('.__cf_email__'),n=0;n<c.length;n++)try{(h=c[n]).parentNode.replaceChild(e.createTextNode(a(h.getAttribute('data-cfemail'),0)),h)}catch(e){}}catch(e){}}(document);</script>

    <script src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/custom.js') }}"></script>

    @yield('scritps')

  </body>
</html>
