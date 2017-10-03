<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

    public function books()
    {
        return $this->hasMany(Book::class);
    }


    public function createBook(array $array)
    {
        $book = new Book($array);
        $this->books()->save($book);
        return $book;
    }

    public function scopeFromSearch($query,string $search=null)
    {
        if ($search) {
            $searchItems = array_map('strval', explode(' ', $search));
            foreach ($searchItems as $item){
                $query->orWhere(DB::raw("CONCAT(`name`,' ',`email`)"),'LIKE',"%$item%");
            }
        }
    }
    public function scopeFromRole($query, $role = null)
    {
        if ($role && $role != 'all') {
            $query->where('role', $role);
        }
    }
}
