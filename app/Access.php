<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Access extends Model
{
    protected $fillable=['name','display_name'];
   
    protected $table='access_level';

    public function getRouteKeyName()
    {
        return 'name';
    }

}
