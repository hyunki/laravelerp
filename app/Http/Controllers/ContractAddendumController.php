<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract as Contract;
use App\Http\Requests;
use Session;
use DB;
use App\Http\Helpers\Helper as Helper;

class ContractAddendumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['contracts'] = \App\Contract::select(DB::raw('concat(id," | ",contractNo," | ", name) as userselect, id' ))->orderBy('id','desc')->lists('userselect', 'id');
        $data['contractors'] = \App\Code::where('fieldName' , 'owner');
        $data['countries'] = \App\Country::select(DB::raw('concat(alpha3," | ", nameKor) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        $data['currencies'] = \App\Currency::select(DB::raw('concat(code, " | ", name) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        return view('contract.addendum')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revised = new ContractAddendum;
        $revised->revised_date = $request->revised_date;
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
