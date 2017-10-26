@extends('layouts.master')


@section('content')

  @include('layouts.search-bar')

  <hr />

  {{-- content --}}
  @foreach($books as $book)
    <div class="row">
        <div class="col-lg-3 col-md-3">
              @if(isset($book->cover()->page))
                <center>
                  <img class="img-responsive img-thumbnail" src="{{ url($book->cover()->page) }}">
                </center>
              @else
                <center>
                  <img class="img-responsive img-thumbnail" src="{{ url('images/default-cover.jpg') }}">
                </center>
              @endif
              <div align="center">
                <span class="label label-primary" data-toggle="tooltip" title="Views"><i class="fa fa-eye"></i> 012</span>
                <span class="label label-success" data-toggle="tooltip" title="Bookmark"><i class="fa fa-bookmark-o"></i> 024</span>
                <span class="label label-danger" data-toggle="tooltip" title="Download"><i class="fa fa-cloud-download"></i> 004</span>
              </div>
        </div>
        <div class="col-lg-9 col-md-9">
         <h4><a href="#" class="text-info">{{ $book->title }}</a></h4>

          <p>
            @php($link = '<a href="javascript:;"> (...)</a>')
            {!! str_limit($book->description, 500, $link) !!}
          </p>

          <p>
            <a href="#" class="btn btn-primary btn-xs">View Book
            <i class="fa fa-chevron-right"></i>
            </a>

            <a href="#" class="btn btn-success btn-xs">Bookmark
            <i class="fa fa-bookmark-o"></i>
            </a>

            <a href="#" class="btn btn-danger btn-xs">Download
            <i class="fa fa-cloud-download"></i>
            </a>
          </p>

          <strong>#Tags:</strong>
          <a href="#">Arduino,</a>
          <a href="#">Web,</a>
          <a href="#">Management,</a>
          <a href="#">SQL,</a>
          <a href="#">Visual Studio,</a>
          <a href="#">Windows Form,</a>
          <a href="#">Management,</a>
          <a href="#">SQL,</a>
          <a href="#">Camtasia Studio,</a>
          <a href="#">Arduino Form</a>
        </div>
    </div>
    <hr />
  @endforeach

  {{-- pagination --}}
    <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
      {{ $books->links() }}
    </div>
  {{-- / pagination --}}
  


  {{-- / content --}}
@endsection

