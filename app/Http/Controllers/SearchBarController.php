<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;

class SearchBarController extends Controller
{
    //
    public function autocomplete(Request $request)
    {
		$search = $request->term;


		$books = Book::select('title', 'slug')->where('title', 'LIKE', '%'.$search.'%')->get();

		if (count($books) < 1) {
			return response()->json(['value' => 'No Result Found']);
		}

		$results = [];
		foreach ($books as $book) {
			$value = str_replace('-', ' ', $book->slug);
			$value = ucwords($value);

			$results[] = [
				'id' => $book->slug,
				'value' => $value
			];
		}


		return response()->json($results);
    
    }

    public function submit(Request $request)
    {
    	$search = strtolower($request->search);
    	$search = str_replace(' ', '-', $search);

    	// redirect to view if authenticated (authorized middleware)
    	return redirect()->route('book.show', [$search, 'view']);
    }
}
