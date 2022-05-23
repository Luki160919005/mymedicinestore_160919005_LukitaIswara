<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Product;
use \Datetime;

class ProductController extends Controller
{



    public function index()
    {
        $result = Product::all();
        return view("product.index",["data"=>$result]);
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view("product.create", compact('categories','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product();
        $now = new DateTime();
        $data->product_name=$request->get('product_name');
        $data->product_price=$request->get('product_price');

        $data->created_at=$now->format('Y-m-d H:i:s'); 
        $data->updated_at=$now->format('Y-m-d H:i:s'); 
        $data->category_id=$request->get('category_id');
     
        $data->save();

        return redirect()->route('products.index')->with('status','Data product Baru berhasil tersimpan');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $data=$product;
        return view('product.edit', compact('data','categories','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->product_name = $request->get('product_name');
        $product->product_price = $request->get('product_price');
        $product->category_id = $request->get('category_id');
        $product->save();
        return redirect()->route('products.index')->with('status','Data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        $result = Product::all();
        return view("product.index",["data"=>$result])->with('status','Succeed to delete');
   
        //return redirect()->route('products.index')->with('status','Succeed to delete');

    }


}
