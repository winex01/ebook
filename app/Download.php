<?php

namespace App;


class Download
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
        $this->book->downloads()->attach($this->user_id);

    }//end save

}
