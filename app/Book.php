<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $guarded = [];

	public function pages()
	{
		return $this->hasMany(Page::class);
	}

	public function cover()
	{
		return $this->pages()->first();
	}

    public function views()
    {
        return $this->belongsToMany(User::class, 'book_view')->withTimestamps();
    }

    public function bookmarks()
    {
        return $this->belongsToMany(User::class, 'book_user')->withTimestamps();
    }

    public function downloads()
    {
        return $this->belongsToMany(User::class, 'book_download')->withTimestamps();
    }

    public static function mostViewed($top = 10)
    {
        return \DB::table('book_view')
                ->select(
                        'book_view.book_id',
                        'books.title', 
                        \DB::raw('COUNT(book_view.book_id) as total_views')
                )
                ->join('books', 'book_view.book_id', '=', 'books.id')
                ->groupBy('book_view.book_id')
                ->orderBy('total_views', 'desc')
                ->limit($top)
                ->get();
    }

    public static function mostBookmark($top = 10)
    {
        return \DB::table('book_user')
                ->select(
                        'book_user.book_id',
                        'books.title', 
                        \DB::raw('COUNT(book_user.book_id) as total_bookmarks')
                )
                ->join('books', 'book_user.book_id', '=', 'books.id')
                ->groupBy('book_user.book_id')
                ->orderBy('total_bookmarks', 'desc')
                ->limit($top)
                ->get();
    }

    public static function mostDownload($top = 10)
    {
        return \DB::table('book_download')
                ->select(
                        'book_download.book_id',
                        'books.title', 
                        \DB::raw('COUNT(book_download.book_id) as total_downloads')
                )
                ->join('books', 'book_download.book_id', '=', 'books.id')
                ->groupBy('book_download.book_id')
                ->orderBy('total_downloads', 'desc')
                ->limit($top)
                ->get();
    }
}
