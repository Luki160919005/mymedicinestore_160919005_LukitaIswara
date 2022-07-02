<?php

namespace App\Http\Controllers;

use App\Models\MedicineTransaction;
use Illuminate\Http\Request;

class MedicineTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function transactionDetail($id)
    {
       
        $data=MedicineTransaction::find($id);
        $medicines=$data->medicines;
        return view("transaction.showdetail2", compact('medicines'));
  
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
     * @param  \App\Models\MedicineTransaction  $medicineTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineTransaction $medicineTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicineTransaction  $medicineTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicineTransaction $medicineTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicineTransaction  $medicineTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicineTransaction $medicineTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineTransaction  $medicineTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineTransaction $medicineTransaction)
    {
        //
    }
}
