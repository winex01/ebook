<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DataTables;
use Validator;

class AdminBookController extends Controller
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
    /**
     * get all books using datatables library
     *
     * @return all books
     */
    public function all()
    {
        $books = Book::select(['id', 'title', 'created_at' , 'slug']);
        return DataTables::of($books)->addColumn('action', function ($book) {
                return '
                	<div align="center">
                		<a href="book/show/'.$book->slug.'" class="btn btn-xs btn-info"><i class="fa fa-search"></i> Select</a>
                		<button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button>
                		<button onclick="deleteBook('.$book->id.', \'' .$book->title. '\')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                	</div>
                ';
            })->make(true);
    }

    /**
     * add new book
     *
     * @return message
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title'       => 'required',
            'description' => 'required'
        ]);

        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        // check if slug exist if it does incre at end
        $slug = str_slug($request->title);
        $count = Book::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        // save new book
        $book = Book::create([
            'title'       => title_case($request->title),
            'slug'        => $slug,
            'description' => $request->description
        ]);

        // return response()->json($book);


        // $uploadPath = 'uploads/pdf';
        // $fileName = time().uniqid().'.'; 
        // $fileExtension = $request->file->getClientOriginalExtension();
        // // store uploaded files in upload/pdf
        // $request->file->move(public_path($uploadPath), $fileName.$fileExtension);


    }

    /**
     * remove book
     *
     * @return void
     */
    public function delete(Book $book)
    {
        $deleted = $book->title;
        Book::destroy($book->id);

        return response()->json(['title' => $deleted]);
    }

    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first()->toArray();
        
        return view('admin.book-show', compact('book'));
    }



}
