<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable =['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function books()
    {
        $this->hasMany(Book::class);
    }

    public function scopeCreateCategory(array $data)
    {

        $category = new Category($data);
        $this->save($category);
        return $category;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name']=$value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
