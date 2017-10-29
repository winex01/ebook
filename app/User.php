<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function views()
    {
        return $this->belongsToMany(Book::class, 'book_view')->withTimestamps();
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Book::class, 'book_user')->withTimestamps();
    }

    public function downloads()
    {
        return $this->belongsToMany(Book::class, 'book_download')->withTimestamps();
    }

}
