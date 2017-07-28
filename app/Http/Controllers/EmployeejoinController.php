<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Employee as Employee;
use App\Join as Join;
use Session;
use DB;

class EmployeejoinController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

    }

    public function create($id)
    {
    	$data['request'] = $id;
    	return view('employee.createjoin')->with($data);
    }

    public function edit($employeeid, $joinid)
    {
    	$data['employee'] = Employee::where('id', $employeeid)->get();
    	$data['joins'] = Join::where('employee_id',$employeeid)->get();
    	return view('employee.editjoin')->with($data);
    }

    public function update(Request $request, $joinid)
    {
    	$joins = Join::where('id',$joinid);
        $joins->joined_at		= $request->joined_at;
        $joins->resigned_at		= $request->resigned_at;
        $joins->resign_reason	= $request->resign_reason;
        $joins->update();

        $data['employee'] = Employee::find($request->id);
        return view('employee.show')->with($data);
    }

    public function store(Request $request)
    {
    	$joins = new Join;
    	$joins->employee_id = $request->id;
        $joins->joined_at = $request->joined_at;
        $joins->resigned_at = $request->resigned_at;
        $joins->resign_reason = $request->resign_reason;
        if(file_exists($request->file('contract_filename')))
    	{
			$file = $request->file('contract_filename');
            $fileExtension = $file->getClientOriginalExtension();
            $upload_time = date('Ymd His');
            $fileName = $upload_time.$employee->id. '_'. $employee->lastName . $employee->firstName.'.'.$fileExtension;
            $file->move(public_path().'/uploads/employee/contracts',$fileName);
            $employee_join->contract_filename = $fileName;
    	}else
    	{
    		$joins->contract_filename = null;
    	}
    	if(file_exists($request->file('resignation')))
    	{
			$file = $request->file('resignation');
            $fileExtension = $file->getClientOriginalExtension();
            $upload_time = date('Ymd His');
            $fileName = $upload_time.$employee->id. '_'. $employee->lastName . $employee->firstName.'.'.$fileExtension;
            $file->move(public_path().'/uploads/employee/resignation',$fileName);
            $employee_join->contract_filename = $fileName;
    	}else
    	{
    		$joins->contract_filename = null;
    	}  

        $joins->save();

        
        return redirect('employee.list') ;
    }

    public function show($id)
    {

        $data['employees'] = Employee::all();
       
        return view('employee.list')->with($data);
    }
}
