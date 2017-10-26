<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $books = \App\Book::select(['id', 'title', 'slug', 'description']);
        return DataTables::of($books)->addColumn('action', function ($book) {
                return '
                	<div align="center">
                        <div class="btn-group"> 
                    		<a href="book/show/'.$book->slug.'" class="btn btn-xs btn-info"><i class="fa fa-search"></i> Select</a>
                    		<button onclick="edit('.htmlentities($book).')" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button>
                    		<button onclick="deleteBook('.$book->id.', \'' .$book->title. '\')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                	</div>
                ';
            })
            ->editColumn('description', function ($book){
                $link = ' <a onclick="readDescription('.htmlentities($book).')" href="javascript:;" data-toggle="tooltip" title="Read More">(...)</a>';
                return str_limit($book->description, 80, $link);
            })
            ->rawColumns(['action', 'description'])
            ->make(true);
    }
// <button onclick="edit('.$book->id.', \'' .$book->title. '\', \'' .$book->description. '\')" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button>
    /**
     * add new book
     *
     * @return message
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title'       => 'required',
            'description' => 'required|min:150'
        ]);

        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        // check if slug exist if it does incre at end
        $slug = str_slug($request->title);
        $count = \App\Book::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        // save new book
        $book = \App\Book::create([
            'title'       => title_case($request->title),
            'slug'        => $slug,
            'description' => $request->description
        ]);

        return response()->json($book);


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
    public function delete(Request $request)
    {
        $book = \App\Book::findOrFail($request->id);
        $deleted = $book->title;

        foreach ($book->pages as $page) {
            \File::delete($page->page);
        }

        \App\Book::destroy($book->id);

        // TODO delete all/unlink pages photo

        return response()->json(['title' => $deleted]);
    }

    public function show($slug)
    {
        $book = \App\Book::where('slug', $slug)->first();

        $pages = \App\Page::where('book_id', $book->id)->paginate(1);

        return view('admin.book-show', compact('book', 'pages'));
    }

    public function update(Request $request)
    {
        // return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required',
            'description' => 'required|min:150'
        ]);

        if ($validator->fails()) {
            // return error json
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        // check if slug exist if it does incre at end
        $slug = str_slug($request->title);
        $count = \App\Book::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        //save success
        $book = \App\Book::findOrFail($request->id);
        $book->title = title_case($request->title);
        $book->description = $request->description;
        $book->slug = $slug;
        $book->save();

        return json_encode($book);
    }
    
}
