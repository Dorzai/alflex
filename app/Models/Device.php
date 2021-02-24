<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }
}
