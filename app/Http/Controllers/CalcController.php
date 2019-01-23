<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calc;
use App\CalcDetail;
class CalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calc');
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
        $ip=\Request::ip();
        $idrand=md5(date("d-m-Y").$ip);

        $idexist = Calc::where('id', '=', $idrand)->first();
        if ($idexist === null) {
            $calc= new Calc();
            $calc->id = $idrand;
            $calc->save();
        }
       

        $idcd=md5(microtime(true).mt_Rand().$ip);
        $calcdetail= new CalcDetail();
        $calcdetail->formula= $request['formula'];
        $calcdetail->result= $request['result'];
        $calcdetail->id_calcs = $idrand;
        $calcdetail->id = $idcd;
        $calcdetail->save();
        return 1;

        // echo '<pre>'; print_r($request->all()) and die();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getall()
    {
        $data = CalcDetail::orderBy('created_at', 'desc')
                      ->paginate(8);
    	return response()->json($data);
    }

    public function getmy()
    {
        $ip=\Request::ip();
        $idrand=md5(date("d-m-Y").$ip);

        $data = CalcDetail::where('id_calcs','=',$idrand)
                      ->orderBy('created_at', 'desc')
                      ->paginate(8);
    	return response()->json($data);
    }

    public function clean($id)
    {
        $CalcDetail = CalcDetail::where('id', '=', $id )->firstOrFail();
        $CalcDetail->delete();

        return 1;
    }

    public function cleanallmy()
    {
        $ip=\Request::ip();
        $idrand=md5(date("d-m-Y").$ip);

        $CalcDetail = CalcDetail::where('id_calcs', '=', $idrand );
        $CalcDetail->delete();

        return 1;
    }

    public function cleanall()
    {
        $CalcDetail = CalcDetail::orderBy('created_at', 'desc');
        $CalcDetail->delete();
        return 1;
    }
    
    public function spesifik($id)
    {
        return CalcDetail::where('id', '=', $id )
                        ->firstOrFail();
     
    }

    public function updates(Request $request, $id)
    {
        $CalcDetail = CalcDetail::where('id', '=', $id )->firstOrFail();
        $CalcDetail->update($request->all());

        return 1;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
