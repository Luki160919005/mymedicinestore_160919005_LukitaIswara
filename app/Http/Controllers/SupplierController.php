<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Supplier::all();
        return view("supplier.index",["data"=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("supplier.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Supplier();
        $data->name=$request->get('name');
        $data->address=$request->get('address');
        $data->save();

        return redirect()->route('suppliers.index')->with('status','Data Supplier Baru berhasil tersimpan');
    }

    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data=Supplier::find($id);
        return response()->jason(array(
            'status'=>'ok',
            'msg'=>view('supplier.getEditForm', compact('data'))->render()
        ),200);
        
    }

    public function getEditForm2(Request $request){
        $id = $request->get('id');
        $data=Supplier::find($id);
        return response()->jason(array(
            'status'=>'ok',
            'msg'=>view('supplier.getEditForm2', compact('data'))->render()
        ),200);
        
    }

    public function saveData(Request $request){
        $id = $request->get('id');
        $Supplier = Supplier::find($id);
        $Supplier->name= $request->get('name');
        $Supplier->address= $request->get('address');
        $Supplier->save();
        return response()->jason(array(
            'status'=>'ok',
            'msg'=>'Supplier data updated'
        ),200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $data=$supplier;
        return view('supplier.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $supplier->name = $request->get('name');
        $supplier->address = $request->get('address');
        $supplier->save();
        return redirect()->route('suppliers.index')->with('status','Data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('status','Succeed to delete');

    }

    public function deleteData(Request $request){
        try{
            $id = $request->get('id');
            $Supplier = Supplier::find($id);
            $Supplier->delete();
            return response()->json(array(
                'status'=>'ok',
                'msg'=>'Supplier data deleted'
            ),200);
            
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Supplier is not deleted. It may used in the product.'
            ),200);
        }
    }
}
