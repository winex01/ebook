@if($mostDownload->count() > 0)
	<div class="row">
	    <h4>Most Downloaded</h4>
	    <ol>
	        @foreach($mostDownload as $book)
	            <li><a href="{{ route('book.show', [$book->slug, 'view']) }}"> {{ $book->title }}</a></li>

	        @endforeach
	    </ol>
	</div>
@endif

