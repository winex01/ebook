@extends('layouts.guest.master')

@section('content')
	<h4><strong>{{ $book->title }}</strong></h4>

	<p style="text-indent: 20px">{{ $book->description }}</p>
@endsection