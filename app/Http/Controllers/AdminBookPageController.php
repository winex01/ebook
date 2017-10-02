<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AdminBookPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'slug' => 'required',
            'file' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);


        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        // if validation success
    	$uploadPath = 'uploads/page';
        $fileName = time().uniqid().'.'; 
        $fileExtension = $request->file->getClientOriginalExtension();
        // store uploaded files in upload/pdf
        $request->file->move(public_path($uploadPath), $fileName.$fileExtension);

        $page = new \App\Page();
        $page->page = $uploadPath.'/'.$fileName.$fileExtension;

        $book = \App\Book::where('slug', $request->slug)->first();
        $book->pages()->save($page);

    	// return response()->json($book);
    }

    
}
