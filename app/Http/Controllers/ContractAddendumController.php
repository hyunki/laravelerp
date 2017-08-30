<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContractsAddendum as ContractsAddendum;
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
        $data['addendum_type'] = ['1'=>'계약금액','2'=>'계약기간','3'=>'금액및기간','4'=>'기타'];
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

        $revised = new ContractsAddendum;
        
        $revised->contract_id = $request->contract_id;
        $revised->type = $request->type;
        $revised->revised_name = $request->revised_name;
        $revised->revised_no = $request->revised_no;
        if($request->revised_date == ''){
            $revised->revised_date = '';
        }else{
            $revised->revised_date = $request->revised_date;    
        }
        if($request->revised_startdate == ''){
            $revised->revised_startdate = NULL;
        }else{
            $revised->revised_startdate = $request->revised_startdate;    
        }
        if($request->revised_enddate == ''){
            $revised->revised_enddate = NULL;
        }else{
            $revised->revised_enddate = $request->revised_enddate;    
        }

        if ($request->amount == '') {
            $revised->amount = null;
        }else{
             $revised->amount = $request->amount;
        }
        $revised->currency = $request->currency;
        
        $revised->memo = $request->input('memo');
        $revised->save();
        return redirect()->route('contract.show', $request->contract_id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['amendedamount'] = ContractsAddendum::where('contract_id',$id)
        ->sum('amount');
        return view('contract.addendum')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['addendum'] = ContractsAddendum::find($id);
        $data['contracts'] = \App\Contract::select(DB::raw('concat(id," | ",contractNo," | ", name) as userselect, id' ))->orderBy('id','desc')->lists('userselect', 'id');
        $data['contractors'] = \App\Code::where('fieldName' , 'owner');
        $data['countries'] = \App\Country::select(DB::raw('concat(alpha3," | ", nameKor) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        $data['currencies'] = \App\Currency::select(DB::raw('concat(code, " | ", name) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        $data['addendum_type'] = ['1'=>'계약금액','2'=>'계약기간','3'=>'금액및기간','4'=>'기타'];
        return view('contract/addendum_edit')->with($data);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $revised = ContractsAddendum::find($id);
        
        // $revised->contract_id = $request->contract_id;
        $revised->contract_id = $request->contract_id;
        $revised->type = $request->type;
        $revised->revised_name = $request->revised_name;
        $revised->revised_no = $request->revised_no;
        if($request->revised_date == ''){
            $revised->revised_date = '';
        }else{
            $revised->revised_date = $request->revised_date;    
        }
        if($request->revised_startdate == ''){
            $revised->revised_startdate = NULL;
        }else{
            $revised->revised_startdate = $request->revised_startdate;    
        }
        if($request->revised_enddate == ''){
            $revised->revised_enddate = NULL;
        }else{
            $revised->revised_enddate = $request->revised_enddate;    
        }

        if ($request->amount == null) {
            $revised->amount = null;
        }else{
             $revised->amount = $request->amount;
        }
        $revised->currency = $request->currency;
        
        $revised->memo = $request->memo;
        $revised->save();
        return redirect()->route('contract.show', $request->contract_id);

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
