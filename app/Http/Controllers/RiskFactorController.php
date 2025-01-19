<?php

namespace App\Http\Controllers;

use App\Models\Risk_factor;
use App\Http\Requests\StoreRisk_factorRequest;
use App\Http\Requests\UpdateRisk_factorRequest;
use Illuminate\Http\Request;
class RiskFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Risk_factor = Risk_factor::orderBy('id','DESC')->get();
        return view("Risk_factor", compact("Risk_factor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Risk_factor = Risk_factor::orderBy('id','DESC')->get();
        return view("Risk_factortable", compact("Risk_factor"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Risk_factor = new Risk_factor;
        $Risk_factor->description = $request->description;
        $Risk_factor->detail = $request->detail;
        $Risk_factor->save();
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Risk_factor  $Risk_factor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $show="%".$request["show"]."%";
        $Risk_factor=Risk_factor::where('description',"like",$show)->all();
        return view('Risk_factortable',compact('Risk_factor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Risk_factor  $Risk_factor
     * @return \Illuminate\Http\Response
     */
  
    public function edit(Request $request)
    {
        //
        $Risk_factor = Risk_factor::find($request->id);
        return $Risk_factor;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Risk_factor  $Risk_factor
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $Risk_factor = Risk_factor::find($request->id);
        $Risk_factor->description = $request->description;
        $Risk_factor->detail = $request->detail;
        $Risk_factor->save();
        return $this->create();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Risk_factor  $Risk_factor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Risk_factor::find($request->id)->delete();
        return $this->create();
    }
}
