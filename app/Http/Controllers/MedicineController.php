<?php

namespace App\Http\Controllers;


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
        $listdata = DB::select(DB::raw('select * from medicines'));

        //dd($listdata);

        $listdata = DB::table('medicines')->get();

        $listdata= Medicine::all();

        return view('medicine.index',compact('listdata'));
    }

    public function joinTable(){
        $listdata = DB::select(DB::raw('SELECT m.generic_name, m.restriction_formula, c.category_name
        FROM medicines m
        INNER JOIN categories c
        ON m.category_id = c.id'));
        return view('joinTable.index',compact('listdata'));

        
    }

    public function aggregation(){
        
        $listdataNo1 = DB::select(DB::raw('SELECT count(*) as FilteredActs FROM (SELECT c.id FROM medicines m
        INNER JOIN categories c ON m.category_id = c.id GROUP BY c.id) T;'));

        print_r(count($listdataNo1));
        $listdataNo2 = DB::select(DB::raw('SELECT c.category_name as catname FROM medicines m
        RIGHT JOIN categories c ON m.category_id = c.id
        WHERE m.category_id IS NULL'));

    

        $listdataNo3 = DB::select(DB::raw('SELECT c.category_name as categoryName,  IF(IsNull(AVG(price)), "0", AVG(price))as averagePrice FROM medicines m
        RIGHT JOIN categories c ON m.category_id = c.id
        GROUP BY c.category_name;'));

   
        
        $listdataNo4 = DB::select(DB::raw('SELECT c.category_name AS categoryName,count(m.generic_name) AS numberOFMedicines FROM medicines m
        INNER JOIN categories c ON m.category_id = c.id 
        GROUP BY c.category_name
        HAVING count(m.generic_name) = 1'));
   
        

        

        $listdataNo5 = DB::select(DB::raw('SELECT * FROM `medicines` WHERE form IS NOT NULL ORDER BY `id` ASC '));

        
        $listdataNo6 = DB::select(DB::raw('SELECT c.category_name AS categoryName, MAX(m.generic_name),MAX(m.price) AS maxPrice FROM medicines m INNER JOIN categories c ON m.category_id = c.id GROUP BY c.category_name, m.category_id;'));

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
        //
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
