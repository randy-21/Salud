<?php

namespace App\Http\Controllers;

use App\Models\Risk_factor_detail;
use App\Http\Requests\StoreRisk_factor_detailRequest;
use App\Http\Requests\UpdateRisk_factor_detailRequest;
use Illuminate\Http\Request;
class RiskFactorDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        //
        $risk_factor_detail = Risk_factor_detail::orderBy('id','DESC')->get();
        return view("risk_factor_detail", compact("risk_factor_detail"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        //
        $risk_factor_detail = Risk_factor_detail::orderBy('id','DESC')->get();
        return view("risk_factor_detailtable", compact("risk_factor_detail"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        $risk_factor_detail = new Risk_factor_detail;
        $risk_factor_detail->description = $request->description;
        $risk_factor_detail->detail = $request->detail;
        $risk_factor_detail->save();
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\risk_factor_detail  $risk_factor_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        $show="%".$request["show"]."%";
        $risk_factor_detail=Risk_factor_detail::where('description',"like",$show)->all();
        return view('risk_factor_detailtable',compact('risk_factor_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\risk_factor_detail  $risk_factor_detail
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        //
        $risk_factor_detail = Risk_factor_detail::find($request->id);
        return $risk_factor_detail;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\risk_factor_detail  $risk_factor_detail
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        $risk_factor_detail = Risk_factor_detail::find($request->id);
        $risk_factor_detail->description = $request->description;
        $risk_factor_detail->detail = $request->detail;
        $risk_factor_detail->save();
        return $this->create();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\risk_factor_detail  $risk_factor_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        Risk_factor_detail::find($request->id)->delete();
        return $this->create();
    }
}
