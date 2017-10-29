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

    public function bookmarks()
    {
        return $this->belongsToMany(User::class);
    }
}
