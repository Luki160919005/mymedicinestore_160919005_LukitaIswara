<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$listdata = DB::select(DB::raw('select * from medicines'));

        //dd($listdata);

        //$listdata = DB::table('medicines')->get();

        //$listdata= Medicine::all();

        $md = new Medicine();
        $listdata = $md->getalldata();


        return view('medicine.index',compact('listdata'));
    }

    public function showInfo()
    {
        $result=Medicine::orderBy('price','desc')->first();
        return response()->json(array('status'=>'oke','msg'=>"
        <div class='alert alert-danger'>
            Did you know? 
            <br>
            Harga obat termahal adalah ".$result->generic_name . " ".$result->form ." dengan harga " . $result->price)
            ,200);
    }

    public function CheckMed()
    {
        //$listdata = DB::select(DB::raw('select * from medicines'));

        //dd($listdata);

        $data = DB::table('medicines')->get();

        //$listdata= Medicine::all();

        return view('check.show',compact('data'));
    }

    public function test(){
        $result=DB::table('medicines')
            ->where('price','>',20000)
            ->get();
        dd($result);
        
    }

    public function joinTable(){
        $listdata = DB::select(DB::raw('SELECT m.generic_name, m.restriction_formula, c.category_name
        FROM medicines m
        INNER JOIN categories c
        ON m.category_id = c.id'));
        return view('joinTable.index',compact('listdata'));

        
    }

    public function checkImages(){
        //$data = DB::select(DB::raw('select * from medicines'));

        //dd($listdata);

        $data = DB::table('medicines')->get();

        //$data= Medicine::all();

        return view('check.show',compact('data'));
    }

    

    public function aggregation(){
        
        $listdataNo1 = DB::select(DB::raw('SELECT count(*) as FilteredActs FROM (SELECT c.id FROM medicines m
        INNER JOIN categories c ON m.category_id = c.id GROUP BY c.id) T;'));
     
        /*$listdataNo2 = DB::select(DB::raw('SELECT c.category_name as catname FROM medicines m
        RIGHT JOIN categories c ON m.category_id = c.id
        WHERE m.category_id IS NULL'));*/
        
        $listdataNo2=DB::table("medicines")
            ->rightJoin("categories", function($join){
                $join->on("category_id", "=", "categories.id");
            })
            ->select("categories.category_name as catname")
            ->whereNull("category_id")
            ->get();

        $listdataNo3 = DB::select(DB::raw('SELECT c.category_name as categoryName,  IF(IsNull(AVG(price)), "0", AVG(price))as averagePrice FROM medicines m
        RIGHT JOIN categories c ON m.category_id = c.id
        GROUP BY c.category_name;'));

        /*
        $listdataNo3=DB::table("medicines")
        ->rightJoin("categories", function($join){
            $join->on("medicines.category_id", "=", "c.id");
        })
        ->select("categories.category_name as categoryname", "if (isnull(avg(price))", "'0'", "avg (price))as averageprice")
        ->groupBy("categories.category_name")
        ->get();*/
        
        $listdataNo4 = DB::select(DB::raw('SELECT c.category_name AS categoryName,count(m.generic_name) AS numberOFMedicines FROM medicines m
        INNER JOIN categories c ON m.category_id = c.id 
        GROUP BY c.category_name
        HAVING count(m.generic_name) = 1'));

  
              

        $listdataNo5 = DB::select(DB::raw('SELECT * FROM `medicines` WHERE form IS NOT NULL ORDER BY `id` ASC '));

        
        $listdataNo6 = DB::select(DB::raw('SELECT c.category_name AS categoryName, MAX(m.generic_name),MAX(m.price) AS maxPrice FROM medicines m INNER JOIN categories c ON m.category_id = c.id GROUP BY c.category_name, m.category_id;'));

        
        /*$listdataNo6 = DB::table("medicines")
        ->join("categories","medicines.category_id", "=", "categories.id")
        ->select("categories.category_name as categoryname", "generic_name", "max(`medicines.price`) as maxprice")
        ->groupBy("categories.category_name")
        ->get();*/

        return view('aggregation.index',compact('listdataNo1','listdataNo2','listdataNo3','listdataNo4'
        ,'listdataNo5','listdataNo6'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

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
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return view("medicine.show",["data"=>$medicine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
