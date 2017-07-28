<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contract as Contract;
use App\ContractAddendum as ContractAddendum;
use Session;
use DB;
use App\Http\Helpers\Helper as Helper;

class ContractController extends Controller
{
    public function __construct() 
    {
        // 로그인한 유저 && 관리자만 접근가능하게 한다.
    }
    
    // 랜딩페이지 계약목록을 보여준다.
    public function index(Request $request)
    {
        if($request->keyword!='')
        {
            dd($request);
            $data['contracts'] = DB::table('contracts')->where('name','LIKE',$request->keyword)->orderBy('date','desc')->orderBy('id','desc')->paginate(15);
        }
        // $data['contracts'] = DB::table('contracts')->orderBy('date','desc')->orderBy('id','desc')->paginate(15);
        $data['contracts'] = Helper::contractList();
        $data['sum_cur'] =
                array(
                    'EUR' => DB::table('contracts')
                        ->select(DB::raw('totalAmount as EUR, cur1'))
                        ->where('cur1', 'EUR')
                        ->groupBy('cur1')->get(), 
                    'USD' => DB::table('contracts')
                        ->select(DB::raw('totalAmount as USD, cur1'))
                        ->where('cur1', 'USD')
                        ->groupBy('cur1')->get());

	return view('contract.list', $data);               
    
    }
    
    // 계약 ID별 조회화면
    public function show($id)
    {
        $data['contract'] = Contract::find($id);

        return view('contract.show')->with($data);
    }
    
    // 계약 생성 화면
    public function create()
    {
        $data['contractors'] = \App\Code::where('fieldName' , 'owner');
        $data['countries'] = \App\Country::select(DB::raw('concat(alpha3," | ", nameKor) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        $data['currencies'] = \App\Currency::select(DB::raw('concat(code, " | ", name) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        return view('contract.create')->with($data);
    }
    
    public function store(Request $request)
    {
        // validation
        $this->validate($request, array(
            'contractNo' => 'required|max:255|unique:contracts',
            'name' => 'bail|required|max:255',
            'date' => 'bail|required'
        ));
        
        // store data
        
        $contract = new Contract;
        $contract->contractNo = $request->contractNo;
        $contract->name = $request->name;
        $contract->code = $request->code1.'-'.'TK'.'-'.$request->code3.'-'.$request->code4;
        
        $contract->E = $request->E;
        $contract->P = $request->P;
        $contract->C = $request->C;

        $contract->date = $request->date;
        if (!$request->completionDate) {
            $contract->completionDate = null;
        }else
        {$contract->completionDate = $request->completionDate;}
        
        $contract->DeliveryDate_EP = (!$request->DeliveryDate_EP) ? null : $request->DeliveryDate_EP;
        $contract->DeliveryDate_C = $request->DeliveryDate_C;
        $contract->cur1 = $request->cur1;

        $contract->TotalAmount = $request->TotalAmount;
        $contract->cur2 = $request->cur2;
        $contract->epAmount = $request->epAmount;
        $contract->cur3 = $request->cur3;
        $contract->cAmount = $request->cAmount;
        $contract->contractor = $request->contractor;
        $contract->owner = $request->owner;
        $contract->pic = $request->pic;
        $contract->country = $request->country;
        $contract->memo = $request->memo;

        if (file_exists($request->file('contract_filename')))
        {
            $file = $request->file('contract_filename');

            $fileExtension = $file->getClientOriginalExtension();
            $filePath   = '/uploads/contracts/contracts/'.preg_replace("/[ #\&\+\-%@=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i","_",$request->contractNo);
            $upload_time = date('Ymd His');
            $fileName =  preg_replace("/[ #\&\+\-%@=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i","_",$upload_time.$request->contractNo.'.'.$fileExtension);

            $contract->file_name = $filePath.'/'.$fileName;

            $file->move(public_path().$filePath, $fileName);

        }
        else
        {
            $contract->file_name = Null;
        }


        $contract->save();

        Session::flash('success', '정상적으로 등록하였습니다.');

        return redirect()->route('contract.show', $contract->id);
    }
    
    public function edit($id)
    {
        $data['countries'] = \App\Country::select(DB::raw('concat(alpha3," | ", nameKor) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        $data['currencies'] = \App\Currency::select(DB::raw('concat(code, " | ", name) as userselect, id'))->orderBy('userselect')->lists('userselect', 'id');
        $data['contract'] = Contract::find($id);
        return view('contract.edit')->with($data);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'contractNo' => 'required|max:255|unique:contracts,contractNo,'.$id,
            'name' => 'bail|required|max:255',
            'date' => 'bail|required'
        ));

        $contract = Contract::find($id);
        $contract->contractNo = $request->contractNo;
        $contract->name = $request->name;
        $contract->code = $request->code;
        $contract->E = $request->E;
        $contract->P = $request->P;
        $contract->C = $request->C;

        $contract->date = $request->date;
        $contract->completionDate = $request->completionDate;
        $contract->DeliveryDate_EP = $request->DeliveryDate_EP;
        $contract->DeliveryDate_C = $request->DeliveryDate_C;
        $contract->cur1 = $request->cur1;
        $contract->TotalAmount = $request->TotalAmount;
        $contract->cur2 = $request->cur2;
        $contract->epAmount = $request->epAmount;
        $contract->cur3 = $request->cur3;
        $contract->cAmount = $request->cAmount;
        $contract->contractor = $request->contractor;
        $contract->owner = $request->owner;
        $contract->pic = $request->pic;
        $contract->country = $request->country;
        $contract->memo = $request->memo;

        if (file_exists($request->file('contract_filename')))
        {
            $file = $request->file('contract_filename');

            $fileExtension = $file->getClientOriginalExtension();
            $filePath   = '/uploads/contracts/contracts/'.preg_replace("/[ #\&\+\-%@=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i","_",$request->contractNo);
            $upload_time = date('Ymd His');
            $fileName =  preg_replace("/[ #\&\+\-%@=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i","_",$upload_time.$request->contractNo.'.'.$fileExtension);
            $contract->file_name = $filePath.'/'.$fileName;
            $file->move(public_path().$filePath,$fileName);
        }
    
        $contract->update();
        Session::flash('success', '성공적으로 업데이트 하였습니다.');

        return redirect()->route('contract.show', $id);
                
    }
    
    public function delete($id)
    {
        $contract = Contract::find($id);

        $contract->softdelete();

        Session::flash('destroy', '성공적으로 삭제');

        return redirect()->route('contract.list');
    }
    
    public function post_revised(Request $request, $id)
    {
        $revised = new ContractAddendum;
        $revised->date = $request->date;
        return view('contract.addendum');
    }



// public function search(Request $request)
//     {
//         if ($keyword!='') {
//             $query->where(function ($query) use ($keyword) {
//                 $query->where("name", "LIKE","%$keyword%")
//                     ->orWhere("contractNo", "LIKE", "%$keyword%")
//                     ->orWhere("blood_group", "LIKE", "%$keyword%")
//                     ->orWhere("phone", "LIKE", "%$keyword%");
//             });
//         }
//         return $query;
//     }


}
