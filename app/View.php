<?php

namespace App;


class View
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

    public function book()
    {
        return \App\Book::where('slug', $this->slug)->firstOrFail();
    }

    public function save()
    {
        // check if user already bookmark book
        $this->book->views()->attach($this->user_id);

    }//end save

    public static function thisBook($slug)
    {
    	return \App\Book::where('slug', $slug)->firstOrFail();
    }

}
