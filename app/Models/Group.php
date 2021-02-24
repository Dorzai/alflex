<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\Models\User', 'group_id');
    }

    public function devices()
    {
        return $this->hasMany('App\Models\Device', 'group_id');
    }
}
