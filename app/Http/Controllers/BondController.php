<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bond as Bond;

use App\Http\Requests;

use Session;

use DB;

class BondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        
        $data['bonds'] = Bond::all();
       
		return view('bond.list', $data);               
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->setdata();
       

        return view('bond.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validation
        $this->validate($request, [
            'LgNumber' => 'required|max:255|unique:bonds,LgNumber',
            ]);
        
        // store data
        
        $bond = new Bond;
        $bond->contract_id = $request->contract_id;
        $bond->Issuer = $request->Issuer;
        $bond->Category = $request->Category;
        $bond->Format = $request->Format;
        $bond->Outbound = $request->Outbound;
        $bond->Method = $request->Method;
        $bond->Beneficiary = $request->Beneficiary;
        $bond->LgNumber = $request->LgNumber;
        $bond->Type = $request->Type;
        $bond->BondCurrency = $request->BondCurrency;
        $bond->Amount = $request->Amount;
        $bond->FeeCurrency = $request->FeeCurrency;
        $bond->Fee = $request->Fee;
        $bond->IssuingDate = $request->IssuingDate;
        $bond->StartingDate = $request->StartingDate;
        $bond->EndingDate = $request->EndingDate;
        $bond->RetrievalDate = $request->RetrievalDate;
        $bond->Status = $request->Status;
        $bond->Validity = $request->Validity;
        $bond->Memo = $request->Memo;


        $bond->save();

        Session::flash('success', '정상적으로 등록하였습니다.');

        //return redirect()->route('bond.show', $bond->id);
        return redirect()->route('bond.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bond = Bond::find($id);
        return view('bond.show', ['bond' => $bond]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->setdata();
        $data['bond'] = bond::find($id);
        return view('bond.edit')->with($data);
        //return view('bond.edit')->with(['countries' => $countries , 'bond' => $bond , 'currencies' => $currencies]);
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
        $bond = Bond::find($id);
        $bond->contract_id = $request->contract_id;
        $bond->Issuer = $request->Issuer;
        $bond->Category = $request->Category;
        $bond->Format = $request->Format;
        $bond->Outbound = $request->Outbound;
        $bond->Method = $request->Method;
        $bond->Beneficiary = $request->Beneficiary;
        $bond->LgNumber = $request->LgNumber;
        $bond->Type = $request->Type;
        $bond->BondCurrency = $request->BondCurrency;
        $bond->Amount = $request->Amount;
        $bond->FeeCurrency = $request->FeeCurrency;
        $bond->Fee = $request->Fee;
        $bond->IssuingDate = $request->IssuingDate;
        $bond->StartingDate = $request->StartingDate;
        $bond->EndingDate = $request->EndingDate;
        $bond->RetrievalDate = $request->RetrievalDate;
        $bond->Status = $request->Status;
        $bond->Validity = $request->Validity;
        $bond->Memo = $request->Memo;
        
        $bond->update();

        Session::flash('success', '성공적으로 업데이트 하였습니다.');
        return redirect()->route('bond.show', $id);
        
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

    public function setdata()
    {
         $data['countries'] = \App\Country::select(DB::raw('concat(alpha3," | ", nameKor) as userselect, id'))
            ->orderBy('userselect')
            ->lists('userselect', 'id');
        $data['currencies'] = \App\Currency::select(DB::raw('concat(code, " | ", name) as userselect, id'))
            ->orderBy('userselect')
            ->lists('userselect', 'id');
        $data['contracts'] = \App\Contract::select(DB::raw('concat(id," | ",contractNo," | ", name) as userselect, id' ))->orderBy('id','desc')->lists('userselect', 'id');

        return $data;
    }

}
