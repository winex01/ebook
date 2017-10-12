<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;

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

    	return response()->json($page);
    }

    public function all($id)
    {

        
        $pages = \App\Page::select('id', 'page', 'created_at')->where('book_id', $id);

        $dt = DataTables::of($pages)
            ->addColumn('action', function ($page) {
                return '
                    <div align="center">
                        <a href="#" class="btn btn-xs btn-success"><i class="fa fa-search"></i> View</a>
                        <button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Change</button>
                        <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                ';
            })
            ->addColumn('page', function ($page) {
                return '<center><img src="'.url($page->page).'" class="img-responsive img-rounded" alt="Image" width="50px" height="75px"></center>';
            })
            ->rawColumns(['action', 'page'])
            ->addIndexColumn();


            return $dt->make(true);



    }
    
}






