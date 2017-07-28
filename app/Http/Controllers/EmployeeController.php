<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Employee as Employee;
use App\Join as Join;
use App\Profile as Profile;
use App\Code as Code;

use Crypt;
use Session;
use DB;

class EmployeeController extends Controller
{
    
    public function __construct() 
    {
        // 로그인한 유저 && 관리자만 접근가능하게 한다.
    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['employees'] = Employee::all();

        return view('employee.list')->with($data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = "test";
        return view('employee.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   사원정보 저장
        $employee = new Employee;
        $employee->firstName    = $request->firstName;
        $employee->lastName     = $request->lastName;
        $employee->bod          = $request->bod;
        $employee->idNumber     = $request->idNumber;
        $employee->save();

        // 직원 근무지및 기본정보 저장
        $profile = new Profile;
        $profile->employee_id   = $employee->id;
        $profile->businessPlace = $request->businessPlace;
        $profile->department    = $request->department;
        $profile->dutyPlace     = $request->dutyPlace;
        $profile->title         = $request->title;
        $profile->position      = $request->position;
        $profile->save();        

        $join = new Join;
        $join->employee_id  = $employee->id;
        $join->joined_at    = $request->joined_at;
        $join->save();
        
        Session::flash('success', '정상적으로 등록하였습니다.');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['employee'] = Employee::find($id);
        $data['profile'] = Profile::where('employee_id',$id)->first();

        return view('employee.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employee'] = Employee::find($id);
        return view('employee.edit')->with($data);
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
        $employee = Employee::find($id);
        $employee->firstName    = $request->firstName;
        $employee->lastName     = $request->lastName;
        $employee->bod          = $request->bod;
        $employee->idNumber     = $request->idNumber;
        $employee->update();



        Session::flash('success', '정상적으로 수정하였습니다.');

        return redirect()->route('employee.show', $id);
    }

    public function create_join(Request $request)
    {

    }

    public function store_profile(Request $request, $employee_id)
    {
        $employee_status = new Profile;
        $employee_status->employee_id = $employee_id;
        $employee_status->businessPlace = $request->businessPlace;
        $employee_status->dutyPlace = $request->dutyPlace;
        $employee_status->department = $request->department;
        $employee_status->title = $request->title;
        $employee_status->position = $request->position;
        $employee_status->save();
    }

    public function stroe_join(Request $request, $employee_id)
    {
        $employee_join = new Join;
        $employee_join->employee_id = $employee->id;
        $employee_join->joined_at = $request->joined_at;
        if (file_exists($request->file('contract_filename')))
        {
            $file = $request->file('contract_filename');
            $fileExtension = $file->getClientOriginalExtension();
            $upload_time = date('Ymd His');
            $fileName = $upload_time.$employee->id. '_'. $employee->lastName . $employee->firstName.'.'.$fileExtension;

            $file->move(public_path().'/uploads/employee/contracts',$fileName);

            $employee_join->contract_filename = $fileName;
        }
        else
        {
            $employee_join->contract_filename = Null;
        }
        
        $employee_join->save();
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

    public function uploads()
    {

    }

    public function get_code($tableName_value,$fieldName_value,$codeNumber)
    {
        DB::table('codes')->where('tableName',$tableName_value)->where('fieldName',$fieldName_value)->
            where('active',1)->orderBy('codeValue','ASC')->get();
    }

}