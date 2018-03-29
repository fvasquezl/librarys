<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Area extends Model
{
    protected $fillable = [
        'code', 'name','access_level_id','parent_id'
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

    public function access()
    {
        return $this->belongsTo(Access::class,'access_level_id');
    }

    public function parent(){
        return $this->belongsTo(Area::class , 'parent_id');
    }

}
