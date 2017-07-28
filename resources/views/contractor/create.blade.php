@extends('layouts.main')

@section('content')

<div class="container">
@include('partials._messages')

    <div class="row">
        <h1>거래처 정보입력</h1>
        <hr>
        {!! Form::open(array('route' => 'contractor.store' ,'files'=>'true')) !!}
            {!! Form::label('country', 'Country', []) !!}
            {!! Form::select('country', $countries, 29, ['class' => 'form-control']) !!}

            {{ Form::label('reg_name', '업체명') }}
            {{ Form::text('reg_name', null, array('class' => 'form-control', 'placeholder' => '업체명')) }}
            
            {!! Form::label('reg_num', '사업자등록번호') !!}
            <div class="form-group form-inline">
                {!! Form::text('reg_num', null, ['placeholder' => '앞 3자리' , 'class' => 'form-control']) !!}
                {!! Form::text('reg_num2', null, ['placeholder' => '2자리' , 'class' => 'form-control']) !!}
                {!! Form::text('reg_num3', null, ['placeholder' => '2자리' , 'class' => 'form-control']) !!}
            </div>
                {{ Form::label('type','업태') }}
                {{ Form::text('type', null, ['class' => 'form-control']) }}
                
                {{ Form::label('item','종목') }}
                {{ Form::text('item', null, ['class' => 'form-control']) }}                            
            <hr>
            
            <div class="form-group">
            {!! Form::label('zipcode', '우편번호', []) !!}
            <div class="form-group form-inline">
                {!! Form::text('zipcode', null, ['class' =>'form-control form-inline']) !!}
                <input type="button" onclick="sample4_execDaumPostcode()" value="주소찾기" class="form-control form-inline">
            </div>
            {!! Form::label('address', '주소', []) !!}
            {!! Form::text('address', null, ['class' =>'form-control']) !!}
            {!! Form::label('address2', '나머지주소', []) !!}
            {!! Form::text('address2', null, ['class' =>'form-control']) !!}
            </div>
            {{ Form::label('contract_filename', '사업자등록증') }}
            {{ Form::file('contract_filename', ['class'=>'form-control']) }}

            {{ Form::submit('등록', ['class' => 'form-control btn-success', 'style' => 'margin-top: 20px;' ]) }}
        {!! Form::close() !!}
    </div>

@include('partials.address')
@include('partials.ckeditor')


@endsection