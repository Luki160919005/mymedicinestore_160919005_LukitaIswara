<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{


    public function Update(){
        return view ('welcome',['name'=>'Luki']);
    }

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
        $data->product_name=$request->get('product_name');
        $data->product_price=$request->get('product_price');
        $data->created_at=$request->get('created_at');
        $data->updated_at=$request->get('updated_at');
     
        $data->save();

        return redirect()->route('product.index')->with('status','Data product Baru berhasil tersimpan');
    }


}
