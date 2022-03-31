<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $incrementing = true;
    protected $table='categories';
    protected $primaryKey = 'id';
    protected $fillable = ['id','category_name','description','created_at','updated_at'];
    public $timestamps = false;

    public function getalldata(){

        return Category::all();
    }

    

    public function getMedicines()
    {
        return $this->hasMany('App\Models\Medicine','category_id','id');

    }

}
