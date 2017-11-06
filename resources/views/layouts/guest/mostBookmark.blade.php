@if($mostBookmark->count() > 0)
	<div class="row">
	    <h4>Most Bookmarked</h4>
	    <ol>
	        @foreach($mostBookmark as $book)
	            <li><a href="{{ route('book.show', [$book->slug, 'bookmark']) }}"> {{ $book->title }}</a></li>

	        @endforeach
	    </ol>
	</div>
@endif

