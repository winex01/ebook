@extends('layouts.master')


@section('content')
@include('layouts.search-bar')

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
@endsection

