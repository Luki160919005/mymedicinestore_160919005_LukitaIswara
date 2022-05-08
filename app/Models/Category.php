<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine; 

class Category extends Model
{
    use HasFactory;

    public function medicines()
    {
        return $this->hasMany('App\Models\Medicine', 'category_id', 'id');
    }

}
