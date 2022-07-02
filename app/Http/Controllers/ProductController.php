<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Product;
use \Datetime;

class ProductController extends Controller
{

    public function front_index()
    {
        $products = Product::all();
        return view("frontend.product",compact('products'));
    }

    public function cart(){
        return view('frontend.cart');
    }
    public function addToCart($id){
        $p = Product::find($id);
        $cart=session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id]=[
                "name"=>$p->product_name,
                "quantity"=>1,
                "price"=>$p->product_price,
                "photo"=>$p->image
            ];

        }
        else{
            $cart[$id]['quantity']++;

        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product added to cart successfully!');
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
        $now = new DateTime();
        $data->product_name=$request->get('product_name');
        $data->product_price=$request->get('product_price');

        $file=$request->file('logo');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->logo=$imgFile;

        $data->image="";
        $data->created_at=strval($now->format('Y-m-d H:i:s')); 
        $data->updated_at=strval($now->format('Y-m-d H:i:s')); 
        $data->category_id=$request->get('category_id');
     
        $data->save();

        return redirect()->route('products.index')->with('status','Data product Baru berhasil tersimpan');
    }

    public function changeLogo(Request $request){
        $id = $request->get('id');
        $file = $request->file('logo');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $product=Product::find($id);
        $product->logo=$imgFile;
        $product->save();
        return redirect()->route('products.index')->with('status','product logo is changed');
        
    }


    public function edit(Product $product)
    {
        $this->authorize('delete-permission',$product);
        try{
            $categories = Category::all();
            $suppliers = Supplier::all();
            $data=$product;
            return view('product.edit', compact('data','categories','suppliers'));
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Supplier is not deleted. It may used in the product.'
            ),200);
        }
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
        $this->authorize('delete-permission',$product);
        try{
            $product->product_name = $request->get('product_name');
            $product->product_price = $request->get('product_price');
            $product->category_id = $request->get('category_id');
            $product->save();
            return redirect()->route('products.index')->with('status','Data berhasil diubah');
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Supplier is not deleted. It may used in the product.'
            ),200);
        }


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
        $this->authorize('delete-permission',$product);
        try{
            $product->delete();
            $result = Product::all();
            return view("product.index",["data"=>$result])->with('status','Succeed to delete');
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Supplier is not deleted. It may used in the product.'
            ),200);
        }
   
        //return redirect()->route('products.index')->with('status','Succeed to delete');

    }


}
