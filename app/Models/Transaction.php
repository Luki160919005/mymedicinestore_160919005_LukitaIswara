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

    public function customer()
    {
        return $this->belongsTo('App\Models\Customers','customer_id');
                
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_transaction',
    'transaction_id','product_id')->withPivot('quantity','product_price');
    }

    public function insertProduct($cart, $user){
        $total=0;
        foreach($cart as $id => $detail){
            $total += $detail['price']*$detail['quantity'];
            $this->products()->attach($id,['quantity' => $detail['quantity'], 'subtotal' => $detail['price']]);

        }
        return $total;

    }
    
}
