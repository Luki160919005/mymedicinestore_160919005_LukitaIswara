<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{


    public function category()
    {
        return $this->belongsTo('App\Medicine','category_id');

    }


}
