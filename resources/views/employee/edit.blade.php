@extends('layouts.main')
@section('content')

    <div class="col-md-8 col-md-offset-2">
    @include('partials._messages')
        {{ Form::label('id' , 'ID')}}
            <div class="form-control not-editable">{{ $employee->id }}</div>
    
        {!! Form::model($employee, ['method' => 'PUT', 'route'=>['employee.update',$employee->id]]) !!}
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
            <h4>직원정보</h4>

            @if (empty($employee_join))
                <div class="form-group form-inline">
                    {!! Form::label('joined_at', '입사일자', []) !!}
                    {!! Form::text('joined_at', null, ['class'=>'form-control']) !!}
                    {!! Form::label('contract_filename', '근로계약서', []) !!}
                    {!! Form::file('contract_filename', null, ['class'=>'form-control']) !!}
                </div>
            @else
                @foreach ($employee_join as $join)
                {!! Form::model($employee_join, ['method' => 'PUT', 'route'=>['employee.update',$employee->id]]) !!}

                 <div class="form-group form-inline">
                    <input type="hidden" name="join_id" value="{{ $join->id }}">{{ $join->id }}

                    {{ Form::label('joined_at','입사일자') }}
                    {{ Form::date('joined_at', $join->joined_at , ['class' => 'form-control']) }}
                                
                    {{ Form::label('contract_filename', '근로계약서') }}
                    {{ Form::file($join->employment_contract, ['class'=>'form-control']) }}
                </div>
                <input type="submit" class="btn btn-success">
                {!! Form::close() !!}
                @endforeach
               
                {!! Form::open(['route' => 'employee.store' ,'files'=>'true']) !!}
                <div class="form-group form-inline">
                    {!! Form::hidden('employee_id', $employee->id, []) !!}
                    {!! Form::label('joined_at', '입사일자', []) !!}
                    {!! Form::date('joined_at', null, ['class'=>'form-control', 'max' => '9999-12-31']) !!}
                    {!! Form::label('contract_filename', '근로계약서', []) !!}
                    {!! Form::file('contract_filename', null, ['class'=>'form-control']) !!}
                    <input type="submit" class="btn btn-success">
                </div>
                {!! Form::close() !!}
            @endif

            <input type="submit" class="btn btn-success btn-block">
        {!! Form::close() !!}
    </div>


@endsection