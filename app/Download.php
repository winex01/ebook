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

    public static function thisBook($slug)
    {
        $book = \App\Book::where('slug', $slug)->firstOrFail();
        
        $files = [];
        foreach($book->pages as $page) {
            $files[] = $page->page;
        }

        if (!empty($files)) {
            
            $path_filename = 'zip/'.$slug.uniqid().'.zip'; 
            \Zipper::make($path_filename)->folder($slug)->add($files)->close();

            return public_path($path_filename);
        }else{
            $filename = str_replace('-', ' ', ucwords($slug));
            flash()->overlay($filename.' has no page yet.', 'System Message');
        }

    }


}
