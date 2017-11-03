@extends('layouts.guest.master')

@section('content')
	<h4><strong>{{ $book->title }}</strong> <sub class="text-success">{{ $book->created_at->diffForHumans() }}</sub></h4>

	<p style="text-indent: 20px">{{ $book->description }}</p>
	

<center>
	{{ $pages->links() }}

	<div class="container-fluid">
	    @foreach($pages as $page)
	        <img src="{{ url($page->page) }}" class="img-responsive img-thumbnail" alt="Image">
	    @endforeach
	</div>

	{{ $pages->links() }}

</center>


@endsection