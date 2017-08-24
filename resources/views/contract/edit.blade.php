@extends('layouts.main')

@section('content')

    <div class="col-md-8 col-md-offset-2">
    @include('partials._messages')
        {{ Form::label('id' , 'ID')}}
            <div class="form-control not-editable">{{ $contract->id }}</div>
            
        {!! Form::model($contract, ['route' => ['contract.update' , $contract->id] , 'files'=>'true']) !!}

            {{ Form::label('contractNo' , '계약번호')}}
            {{ Form::text('contractNo', null, array('class' => 'form-control inactive', 'placeholder' => '계약번호' )) }}

            {{ Form::label('name', '계약명') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => '계약명')) }}

            {{ Form::label('code', '코드' ) }}
            {{ Form::text('code', null, array('class' => 'form-control', 'placeholder' => '공사번호')) }}

            <label>Scope :</label>
            <div class="form-group form-inline">
                {!! Form::label('E', 'E', []) !!}
                {!! Form::checkbox('E', 1, isset($contract->E) ? $contract->E['check'] : 0, []) !!}

                {!! Form::label('P', 'P', []) !!}
                {!! Form::checkbox('P', 1, isset($contract->P) ? $contract->E['check'] : 0, []) !!}

                {!! Form::label('C', 'C', []) !!}
                {!! Form::checkbox('C', 1, isset($contract->C) ? $contract->E['check'] : 0, []) !!}
            </div>

            {{ Form::label('date', '계약일자') }}
            {{ Form::date('date', null, array('class' => 'form-control', 'max' => '9999-12-31')) }}
            
            {{ Form::label('completionDate', '계약종료일') }}
            {{ Form::date('completionDate', null, array('class' => 'form-control', 'max' => '9999-12-31')) }}

            {{ Form::label('DeliveryDate_EP', 'EP 납기일') }}
            {{ Form::date('DeliveryDate_EP', null, array('class' => 'form-control', 'max' => '9999-12-31')) }}

            {{ Form::label('DeliveryDate_C', 'C 납기일') }}
            {{ Form::date('DeliveryDate_C', null, array('class' => 'form-control', 'max' => '9999-12-31')) }}

            {{ Form::label('epAmount', 'EP금액') }}
            {{ Form::select('cur2',$currencies, null, array('class' => 'form-control', 'placeholder' => '통화')) }}
            {{ Form::text('epAmount', null, array('class' => 'form-control', 'placeholder' => 'EP금액')) }}

            {{ Form::label('cAmount', 'C금액') }}
            {{ Form::select('cur3',$currencies, null, array('class' => 'form-control', 'placeholder' => '통화')) }}
            {{ Form::text('cAmount', null, array('class' => 'form-control', 'placeholder' => 'C금액')) }}

            {{ Form::label('TotalAmount', '계약금액') }}
            {{ Form::select('cur1', $currencies , null ,array('class' => 'form-control', 'placeholder' => '통화')) }}
            {{ Form::text('TotalAmount', null, array('class' => 'form-control', 'placeholder' => '계약금액')) }}

            {{ Form::label('contractor', '발주처') }}
            {{ Form::text('contractor', null, array('class' => 'form-control', 'placeholder' => '발주처')) }}

            {{ Form::label('owner', '사업주') }}
            {{ Form::text('owner', null, array('class' => 'form-control', 'placeholder' => '사업주')) }}
            
            {{ Form::label('country', '발주국') }}
            {!! Form::select('country', $countries , null ,['class' => 'form-control', 'placeholder' => '국가 선택']) !!}

            {{ Form::label('pic', '담당PM') }}
            {{ Form::text('pic', null ,['class' => 'form-control', 'placeholder' => 'PM']) }}

            {!! Form::label('memo', 'Memo', []) !!}
            <textarea  name="memo" id="memo" class="form-control" >{{ $contract->memo }}</textarea>

            {!! Form::label('contract_filename', '공사계약서', []) !!}
            {!! Form::file('contract_filename', ['class'=>'form-control']) !!}
            {{ Form::submit('등록', array('class' => 'form-control btn-success', 'style' => 'margin-top: 20px;' )) }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! Form::close() !!}
    </div>

@include('partials.ckeditor')

@endsection


