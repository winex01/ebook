@extends('layouts.guest.master')


@section('content')
  
  
  @include('layouts.guest.search-bar')

  @include('flash::message')

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
                <span class="label label-primary" data-toggle="tooltip" title="Views"><i class="fa fa-eye"></i> {{ sprintf("%03d", $book->views()->count()) }}</span>
                <span class="label label-success" data-toggle="tooltip" title="Bookmarks"><i class="fa fa-bookmark-o"></i> {{ sprintf("%03d", $book->bookmarks()->count()) }}</span>
                <span class="label label-danger" data-toggle="tooltip" title="Downloads"><i class="fa fa-cloud-download"></i> {{ sprintf("%03d", $book->downloads()->count()) }}</span>
              </div>
        </div>
        <div class="col-lg-9 col-md-9">
         <h4><a href="{{ route('book.show', [$book->slug, 'view']) }}" class="text-info">{{ $book->title }} <sub class="text-success">{{ $book->created_at->diffForHumans() }}</sub></a></h4>

          <p>
            @php($link = '<a href="#modal-show-description" data-toggle="modal"> (...)</a>')
            {!! str_limit($book->description, 500, $link) !!}
          </p>

          <p>
            <a href="{{ route('book.show', [$book->slug, 'view']) }}" class="btn btn-primary btn-xs">View Book
            <i class="fa fa-chevron-right"></i>
            </a>

            <a href="{{ route('book.bookmark', [$book->slug, 'bookmark']) }}" class="btn btn-success btn-xs">Bookmark
            <i class="fa fa-bookmark-o"></i>
            </a>

            <a href="{{ route('book.download', [$book->slug, 'download']) }}" class="btn btn-danger btn-xs">Download
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
  

@isset($book)
<div class="modal fade" id="modal-show-description">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><strong>{{ $book->title }}</strong></h4>
      </div>
      <div class="modal-body">
          <p>{{ $book->description }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endisset


  {{-- / content --}}
@endsection


{{-- script --}}
@section('script')
  <script>
      $('#flash-overlay-modal').modal();
  </script>
@endsection
{{-- / script --}}
