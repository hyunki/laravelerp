<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Session;

use App\Contractor as Contractor;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['lists'] = Contractor::all();
        return view('contractor.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['countries'] = \App\Country::select(DB::raw('concat(alpha3," | ", nameKor) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        return view('contractor.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contractor = new Contractor;
        $contractor->reg_name = $request->reg_name;
        $contractor->country = $request->country;
        $contractor->reg_no = $request->reg_no.$request->reg_no2.$request->reg_no3;
        $contractor->reg_name = $request->reg_name;
        $contractor->type = $request->type;
        $contractor->item = $request->item;
        $contractor->zipcode = $request->zipcode;
        $contractor->address = $request->address;
        $contractor->address2 = $request->address2;

        $contractor->save();

        $data['session'] = Session::flash('success', '성공적으로 저장하였습니다.');
        return view('contractor.show')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
