<?php

namespace App;


class Bookmark 
{
	protected $book;
	protected $slug;
    protected $user_id;
    //
    public function __construct($slug)
    {
    	$this->slug = $slug;
    	$this->user_id = \Auth::user()->id;
    	$this->book = $this->book();
    }

    private function book()
    {
    	return \App\Book::where('slug', $this->slug)->firstOrFail();
    }

    public function save()
    {
    	// check if user already bookmark book
        $checkBook = \DB::table('book_user')
                    ->where('book_id', $this->book->id)
                    ->where('user_id', $this->user_id)
                    ->get();
        
        if (!count($checkBook)) {
            $this->book->bookmarks()->attach($this->user_id);
            flash()->overlay('Bookmark Successfully.', 'System Message'); 
        }else{
            flash()->overlay('You already bookmark this book.', 'System Message'); 
        }
    }//end save

}
