<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Area extends Model
{
    protected $fillable = [
        'code', 'name','parent_id'
    ];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name']=$name;
        $this->attributes['url'] = Str::slug($name);
    }

}
