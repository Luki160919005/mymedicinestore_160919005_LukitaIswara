<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function insertProduct($cart, $user){
        $total=0;
        foreach($cart as $id => $detail){
            $total += $detail['price']*$detail['quantity'];
            $this->products()->attach($id,['quantity' => $detail['quantity'], 'subtotal' => $detail['price']]);

        }
        return $total;

    }
    

     public function submit_front(){
        $this->authorize('customer');

        $cart = session()->get('cart');
        $user = Auth::user();
        $t = new Transaction;
        $t->buyer_id = 1;
        $t->user_id = $user->id;
      
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        $totalPrice = $t->insertProduct($cart, $user);
        $t->total = $totalPrice;
        $t->save();

        session()->forget('cart');
        return redirect('home');

     }
    
    


    public function index()
    {
        $result=Transaction::all();
  
        //dd($result);
        return view("Transaction.index",["data"=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function showAjax(Request $request)
    {
        
        $id=$request->id;
        return response()->json(array(
            'msg'=>$id
        ),200);

    
    }

    public function form_submit_front()
    {
        $this->authorize('checkmember');
        return view('frontend.checkout');
    }
  

    public function showAjax2($id)
    {
       
        $data=Transaction::find($id);
        $medicines=$data->medicines;
        return response()->json(array(
            'msg'=>view('transaction.showdetail',compact('data','medicines'))->render()
        ),200);
  
    }
    public function showAjax3($id)
    {
       
        $data=Transaction::find($id);
        $medicines=$data->medicines;
        return view("transaction.showdetail2", compact('medicines'));
  
    }

}
