<!-- app/views/insurance/insurance.blade.php -->
@extends('layouts.main')

@section('content')

<div class="col-md-10 col-md-offset-1 ">
    <h1>보험계약</h1>
    <a class="btn btn-info" href="{{ route('insurance.create') }}">계약추가</a>
    <hr>
    <table class="table table-condensed table-hover table-bordered table-striped">

            <thead>
                <th>ID</th>
                <th>보험사</th>
                <th>보험종목</th>
                <th>계약번호</th>
                <th>상품명</th>
                <th>납부보험료</th>
                <th>납부방법</th>
                <th>유효여부</th>
                <th>계약시작일</th>
                <th>계약종료일</th>
                <th>계약자</th>
                <th>피보험자</th>
                <th>변경내역보기</th>
            </thead>
            <tbody>
                @foreach ($insurances as $insurance) 
                    <tr>
                        <th>{{$insurance->id}}</th>
                        <td><a href="{{ route('insurance.show', $insurance->id) }}">{{ $insurance->insuranceNo }}</a></td>
                        <td>{{ substr($insurance->name, 0 , 30 ) }} {{ (count_chars($insurance->name) > 30) ? " ..." : "" }}</td>
                        <td>{{$insurance->code}}</td>
                        <td>{{$insurance->date}}</td>
                        <td>
                            <div style="text-align:left" class="col-md-3">
                                {{$insurance->cur1}}    
                            </div>
                            <div class="col-md-9" style="text-align:right;">
                                {{ number_format((float)$insurance->TotalAmount,2) }}
                            </div>
                        </td>
                        <td style="text-align: left;">{{$insurance->cur2}}</td>
                            <td style="text-align:right;"> {{number_format((float)$insurance->epAmount)}}</td>
                        <td style="text-align: left;">{{$insurance->cur3}} </td>
                            <td style="text-align:right;"> {{number_format((float)$insurance->cAmount)}}</td>
                        <td>{{$insurance->insuranceor}}</td>
                        <td>{{$insurance->owner}}</td>
                        <td>{{$insurance->country}}</td>
                        <td>
                            {{-- <a class="btn btn-default" href="/insurance/{{ $insurance->id }}" value="PUT"> <span class="glyphicon glyphicon-edit"></span> </a> --}}
                            <a class="btn btn-alert" href="{{ route('insurance.edit' , $insurance->id ) }}" value="update"> <span class="glyphicon glyphicon-edit"></span> </a>
                            {!! Form::open(['route' => ['insurance.destroy', $insurance->id], 'method' => 'DELETE', 'class' => 'glyphicon glyphicon-delete']) !!}
                            
                            {{ Form::submit('삭제', ['class' => 'btn btn-danger']) }}
                            
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach

            <tr>
           
            </tr>  
       </tbody>
    </table>

{!! $insurances->links()  !!}

</div>
@endsection