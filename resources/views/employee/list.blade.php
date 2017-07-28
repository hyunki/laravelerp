<!-- app/views/employee/employee.blade.php -->
@extends('layouts.main')
@section('content')



<div class="col-md-10 col-md-offset-1 ">
    <h1>임직원 조회</h1>
    <a class="btn btn-info" href="{{ route("employee.create") }}">직원추가</a>
    <hr>
    <table class="table table-condensed table-hover table-striped">
            <thead>
                <th>ID</th>
                <th class="text-center">이름</th>
                <th class="text-center">직위</th>
                <th class="text-center">생년월일</th>
                <th class="text-center">사업장</th>
                <th class="text-center">근무지</th>
                <th>부서</th>
                <th>내선번호</th>
                <th>휴대전화</th>
                <th>현장</th>
                <th>입사일</th>
                <th>퇴사일</th>
                <th class="text-center">수정</th>
            </thead>

            <tbody>
                @foreach ($employees as $employee) 

                    <tr>
                        <td>
                          <a href="{{ route('employee.show' , $employee->id) }}">{{$employee->id}}</a>
                        </td>
                        <td>
                          <a href="{{ route('employee.show' , $employee->id) }}">{{$employee->lastName}}{{$employee->firstName}}</a>
                        </td>
                        <td>
                        {{-- {{ $title = new App\Code }}
                        @foreach ($title->where('fieldName','title')->where('code_id',$employee->profiles->last()['title'])->get() as $element)
                            {{$element->codeValue}}
                        @endforeach
                        
                        <td>
                            {{$employee->bod}}
                        </td>
                        <td>
                            {{ $employee->profiles->last()['businessPlace'] }}
                        </td>
                        <td>
                            {{ $employee->profiles->last()['dutyPlace'] }}
                        </td>
                        <td>
                            {{ $employee->profiles->last()['department'] }}
                        </td> --}}
                        <td></td>
                        <td></td>
                    {{--     <td>
                            {{ $employee->joins->last()['joined_at'] }}
                        </td>
                        <td>
                            {{ $employee->joins->last()['resigned_at'] }} --}}
                        </td>
                        <td><a href="{{ route('employee.edit',$employee->id) }}">수정</a> </td>
                    </tr>
                @endforeach
       </tbody>
    </table>


</div>
@endsection