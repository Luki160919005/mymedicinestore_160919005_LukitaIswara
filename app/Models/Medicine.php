<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// App\Models\Category;

class Medicine extends Model
{
    public $incrementing = true;
    protected $table='medicines';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
    'generic_name',
    'form',
    'restriction_formula',
    'description',
    'forms',
    'faskes_tk1','faskes_tk2','	faskes_tk3',
    'created_at','updated_at','category_id','price','image'];
    public $timestamps = false;

    public function getalldata(){

        return Medicine::all();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','id','category_id');

    }
   


}
