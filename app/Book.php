<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Book extends Model
{
    protected $fillable= ['title','abstract','category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute()
    {
        return route('books.show',[$this->id,$this->slug]);
    }

    public function scopeFromCategory($query, Category $category=null)
    {
        if ($category && $category->exists) {
            $query->where('category_id', $category->id);
        }
    }

    public function scopeFromSearch($query,string $search=null)
    {
        if ($search) {
            $searchItems = array_map('strval', explode(' ', $search));
            foreach ($searchItems as $item){
                $query->orWhere(DB::raw("CONCAT(`title`,' ',`abstract`)"),'LIKE',"%$item%");
            }
        }
    }
}
