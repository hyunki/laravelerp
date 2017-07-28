@extends('layouts.main')

@section('content')

<div class="container">
@include('partials._messages')

    <div class="row">
        <h1>직원정보 입력</h1>
        <hr>
        {!! Form::open(array('route' => 'employee.store' ,'files'=>'true')) !!}
            {{ Form::label('lastName', '성') }}
            {{ Form::label('firstName', '이름') }}
            {{ Form::text('lastName', null, array('class' => 'form-control', 'placeholder' => '성')) }}
            {{ Form::text('firstName', null, array('class' => 'form-control', 'placeholder' => '이름')) }}
            
            {!! Form::label('bod', '주민등록번호') !!}
            <div class="form-group form-inline">
                {!! Form::text('bod', null, ['placeholder' => '앞 6자리' , 'class' => 'form-control']) !!}
                -
                {!! Form::text('idNumber', null, ['placeholder' => '뒤 7자리', 'class' => 'form-control']) !!}
            </div>
            <hr>
            <div class="form-group">
                {{ Form::label('joined_at','입사일자') }}
                {{ Form::date('joined_at', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                            
                {{ Form::label('contract_filename', '근로계약서') }}
                {{ Form::file('contract_filename', ['class'=>'form-control']) }}
            </div>
            <hr>
            <div class="form-group">
            {!! Form::label('businessPlace', '사업장') !!}
            {!! Form::select('businessPlace', ['1' => '본사', '2'=>'당진공장'], ['class' => 'form-control']) !!}
            
            {!! Form::label('dutyPlace', '근무지') !!}
            {!! Form::select('dutyPlace', ['1' => '본사','2'=>'당진공장', '3'=>'쿠웨이트'], ['class' => 'form-control']) !!}
            
            {!! Form::label('department', '부서') !!}
            {!! Form::select('department', ['1' => '경영지원팀','2'=>'설계팀','3'=>'영업팀' , '4'=>'PM팀'], ['class' => 'form-control']) !!}

            {!! Form::label('title', '직위') !!}
            {!! Form::select('title', [
                '1'=>'사장','1'=>'부사장','1'=>'전무이사','1'=>'상무이사','1'=>'이사','1'=>'부장','1'=>'차장','1'=>'과장','1'=>'대리','1'=>'사원','1'=>'인턴'
            ], ['class' => 'form-control']) !!}            
            <hr>
            {!! Form::label('position', '직함') !!}
            {!! Form::text('position', null, ['class' => 'form-control']) !!}
            </div>


            {{ Form::submit('등록', ['class' => 'form-control btn-success', 'style' => 'margin-top: 20px;' ]) }}
        {!! Form::close() !!}
    </div>

@endsection