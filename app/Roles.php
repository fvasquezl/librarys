<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Roles extends Model
{
    protected $fillable=['name','display_name'];

    public function getRouteKeyName()
    {
        return 'name';
    }

}
