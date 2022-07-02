<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function showlist($id_category){
        $data = Category::find($id_category);
        $nameCategory = $data->name;
        $result = $data->medicines;

        if($result) $getTotalData=$result->count();
            else $getTotalData = 0;
        return view('report.index',compact('id_category','nameCategory','getTotalData'));
    
    }

    
    public function index()
    {
        $result = Category::all();
        return view("category.index",["data"=>$result]);
    }
    public function categoriesCreate()
    {
        return view("category.create");
      
    }
    

    public function create()
    {

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
        $data = new Category();
        $data->name=$request->get('name');
        $data->description=$request->get('description');
        $data->created_at=Carbon::now()->toDateTimeString();

        $data->save();

        return redirect()->route('category.index')->with('status','Success to store category data');
    }

    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data=Category::find($id);
        return response()->jason(array(
            'status'=>'ok',
            'msg'=>view('category.getEditForm', compact('data'))->render()
        ),200);
        
    }

    public function getEditForm2(Request $request){
        $id = $request->get('id');
        $data=Category::find($id);
        return response()->jason(array(
            'status'=>'ok',
            'msg'=>view('category.getEditForm2', compact('data'))->render()
        ),200);
        
    }

    public function saveData(Request $request){
        $id = $request->get('id');
        $Supplier = Category::find($id);
        $Supplier->name= $request->get('name');
        $Supplier->address= $request->get('description');
        $Supplier->save();
        return response()->jason(array(
            'status'=>'ok',
            'msg'=>'category data updated'
        ),200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categories)
    {
        $data=$categories;
        return view('category.edit', compact('data'));
    }
    public function editCategories($id)
    {
        
        $data = Category::find($id);
        return view('category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categories)
    {
        //
        $categories->name = $request->get('name');
        $categories->description = $request->get('description');
        $categories->save();
        return redirect()->route('category.index')->with('status','Success to update');


    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categories)
    {
        //
        $this->authorize('delete-permission', $categories);

        try{
            $categories->delete();
            return redirect()->route('category.index')->with('status','Succeed to delete');
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'categories is not deleted. It may used in the product.'
            ),200);
        }
    }

    public function deleteData(Request $request){
        try{
            $id = $request->get('id');
            $categories = Category::find($id);
            $categories->delete();
            return response()->json(array(
                'status'=>'ok',
                'msg'=>'Categories data deleted'
            ),200);
            
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Categories is not deleted. It may used in the product.'
            ),200);
        }
    }

}
