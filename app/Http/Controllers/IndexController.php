<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Index;
use DataTables;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Index::create([
            'book_id' => $request->book_id,
            'description' => ucwords($request->description),
            'page' => $request->page,
        ]);

        flash('Index '.ucwords($request->description).' added successfully!')->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Index::select('id', 'description', 'page')->where('book_id', $id);

        $dt = DataTables::of($book)
            ->addColumn('action', function ($index) {
            return '
                <div align="center">
                    <button onclick="jumpTo('.htmlentities($index).')" class="btn btn-xs btn-success">Jump <i class="fa fa-hand-o-right"></i></button>
                </div>
            ';
        });

        return $dt->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
        Index::destroy($index->id);

        return response()->json(['title' => $index->description]);

    }

    public function all($id)
    {
        $book = Index::select('id', 'description', 'page')->where('book_id', $id);

        $dt = DataTables::of($book)
            ->addColumn('action', function ($index) {
                return '
                    <div align="center">
                        <button onclick="deleteIndex('.htmlentities($index).')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                ';
            });

            return $dt->make(true);
    }

    public function jump(Request $request)
    {
        $url = str_replace('page=69', 'page='.$request->page, $request->url);

        return response()->json(['link' => $url]); 
    }
}
