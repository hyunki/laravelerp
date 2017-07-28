@extends('layouts.main')

@section('content')


<div class="container">
@include('partials._messages')

    <div class="row">
        <h1>지급보증서 입력</h1>
        <hr>
        {!! Form::open(array('route' => 'bond.store')) !!}
            {{ Form::label('contract_id', '계약ID') }}
            {{ Form::select('contract_id', $contracts, null, ['class' => 'form-control', 'placeholder' => '계약ID' ]) }}

            {{ Form::label('Issuer' , '발행기관')}}
            {{ Form::text('Issuer', null, ['class' => 'form-control', 'placeholder' => '발행기관' ]) }}

            {{ Form::label('Category', '종류') }}
            {{ Form::text('Category', null, array('class' => 'form-control', 'placeholder' => '종류')) }}

            {{ Form::label('Type', '보증종류 | Guarantee Type' ) }}
            {{ Form::text('Type', null, array('class' => 'form-control', 'placeholder' => '보증종류')) }}

            {{ Form::label('Format', '양식' ) }}
            {{ Form::text('Format', null, array('class' => 'form-control', 'placeholder' => '양식')) }}

            {{ Form::label('Outbound', '대외여부') }} <br>
            <label for="option1">
                {{ Form::radio('Outbound', 1, true, ['id' => 'option1']) }} 대외
            </label>
            <br>
            <label for="option2">
            {{ Form::radio('Outbound', 0, null, ['id' => 'option2']) }} 대내</label>
            <br>

            {{ Form::label('Method', '통지방법' ) }}
            {{ Form::select('Method', ['1'=>'Mail','2'=>'SWIFT'], 1 , array('class' => 'form-control', 'placeholder' => '선택')) }}
            
            {{ Form::label('Beneficiary', '수익자 | Beneficiary' ) }}
            {{ Form::text('Beneficiary', null, array('class' => 'form-control', 'placeholder' => '수익자')) }}


            {{ Form::label('LgNumber', '보증서 번호 | Credit Number' ) }}
            {{ Form::text('LgNumber', null, array('class' => 'form-control', 'placeholder' => '보증서 번호')) }}

            {{ Form::label('Amount', '보증금액') }}
            {{ Form::select('BondCurrency', $currencies , null ,array('class' => 'form-control', 'placeholder' => '통화선택')) }}
            {{ Form::text('Amount', null, array('class' => 'form-control', 'placeholder' => '보증금액')) }}

            {{ Form::label('FeeAmount', '수수료 금액') }}
            {{ Form::select('FeeCurrency', $currencies , null ,array('class' => 'form-control', 'placeholder' => '통화선택')) }}

            {{ Form::text('FeeAmount', null, array('class' => 'form-control', 'placeholder' => '보증금액')) }}
            {{ Form::label('IssuingDate', '보증서 발행일') }}
            {{ Form::date('IssuingDate', \Carbon\Carbon::now(), array('class' => 'form-control', 'max' => '9999-12-31')) }}

            {{ Form::label('StartingDate', '보증 시작일') }}
            {{ Form::date('StartingDate', null, array('class' => 'form-control', 'max' => '9999-12-31')) }}

            {{ Form::label('EndingDate', '보증 종료일') }}
            {{ Form::date('EndingDate', null, array('class' => 'form-control', 'max' => '9999-12-31')) }}

        

            {{ Form::label('Status', '상태 | Status') }}
            {{ Form::text('Status', null, array('class' => 'form-control', 'placeholder' => '상태 | Status')) }}

            <label>회수여부: <input type="checkbox" value="1" name="Validity"></label>
            <br>
            {{ Form::label('RetrievalDate', '보증 회수일') }}
            {{ Form::date('RetrievalDate', null, array('class' => 'form-control', 'max' => '9999-12-31')) }}

            <br>
                      
            {{ Form::label('Memo', '메모 | Memo') }}
            {{ Form::textarea('Memo', null, array('class' => 'form-control', 'placeholder' => '메모 | Memo')) }}

            {{ Form::submit('등록', ['class' => 'form-control btn-success', 'style' => 'margin-top: 20px;' ]) }}
        {!! Form::close() !!}
    </div>
</div>

@endsection