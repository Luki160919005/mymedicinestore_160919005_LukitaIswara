<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table ='transactions';
    public $primaryKey = 'id';
    public $timestamps = true;
    public $fillable = ['id', 'buyer_id', 'user_id', 'transaction_date', 'created_at','updated_at'];
    public $incrementing = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function buyer()
    {
        return $this->belongsTo('App\Models\Buyer','buyer_id','id');
    }

    public function medicines()
    {
        return $this->belongsToMany('App\Models\Medicine')
                    ->withPivot('quantity','price');
    }
    
}
