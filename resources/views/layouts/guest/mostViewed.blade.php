@if($mostViewed->count() > 0)
	<div class="row">
	    <h4>Most Viewed</h4>
	    <ol>
	        @foreach($mostViewed as $book)
	            <li><a href="#"> {{ $book->title }}</a></li>

	        @endforeach
	    </ol>
	</div>
@endif
