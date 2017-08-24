@extends('layouts.main')
@section('title','계약입력') {{-- yield --}}

@section('content')


<div class="container">
@include('partials._messages')

    <div class="row">
        <h1>공사계약 입력</h1>
        {!! Form::open(array('route' => 'contract.store', 'files'=>'true')) !!}
            {{ Form::label('contractNo' , '계약번호')}}
            {{ Form::text('contractNo', null, ['class' => 'form-control', 'placeholder' => '계약번호','style' => 'ime-mode:inacitve']) }}

            {{ Form::label('name', '계약명') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => '계약명')) }}

            {{ Form::label('code1', '코드' ) }}
            <div class="form-group form-inline">
            {{ Form::text('code1', null, array('class' => 'form-control', 'placeholder' => '공사번호')) }}
            <span class="form-control">-TK-</span>
            {{ Form::text('code3', null, array('class' => 'form-control', 'placeholder' => '공사번호')) }}
            <span class="form-control">-</span>
            {{ Form::text('code4', null, array('class' => 'form-control', 'placeholder' => '공사번호')) }}
            </div>

            <label>Scope :</label>
            <div class="form-group form-inline">
                {!! Form::label('E', 'E', []) !!}
                {!! Form::checkbox("E", 1, 0, []) !!}

                {!! Form::label('P', 'P', []) !!}
                {!! Form::checkbox("P", 1, 0, []) !!}

                {!! Form::label('C', 'C', []) !!}
                {!! Form::checkbox("C", 1, 0, []) !!}

            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('date', '계약일자') }}
                    {{ Form::date('date', \Carbon\Carbon::now(), array('class' => 'form-control' , 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('DeliveryDate_EP', 'EP 납기일') }}
                    {{ Form::date('DeliveryDate_EP', null, array('class' => 'form-control', 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('DeliveryDate_C', 'C 납기일') }}
                    {{ Form::date('DeliveryDate_C', null, array('class' => 'form-control', 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('completionDate', '계약종료일') }}
                    {{ Form::date('completionDate', null, array('class' => 'form-control', 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}
                </div>
            </div>

            <div class="c form-group">
                {{ Form::label('epAmount', 'EP금액') }}
                <div class="form-group form-inline">
                    {{ Form::select('cur2',$currencies, null, array('class' => 'form-control', 'placeholder' => '통화선택')) }}
                    {{ Form::text('epAmount', null, array('class' => 'form-control', 'placeholder' => 'EP금액')) }}
                </div>
                {{ Form::label('cAmount', 'C금액') }}
                <div class="form-group form-inline">
                    {{ Form::select('cur3',$currencies, null, array('class' => 'form-control', 'placeholder' => '통화선택')) }}
                    {{ Form::text('cAmount', null, array('class' => 'form-control', 'placeholder' => 'C금액')) }}
                </div>
               {{ Form::label('TotalAmount', '계약금액') }}
                <div class="form-group form-inline">
                    {{ Form::select('cur1', $currencies , null ,array('class' => 'form-control dropdown', 'placeholder' => '통화선택')) }}
                    {{ Form::text('TotalAmount', null, array('class' => 'form-control', 'placeholder' => '계약금액')) }}
                 </div>
            </div>
    
            {{ Form::label('contractor', '발주처') }}
            {{ Form::text('contractor', null, array('class' => 'form-control', 'placeholder' => '발주처')) }}

            {{ Form::label('owner', '사업주') }}
            {{ Form::text('owner', null, array('class' => 'form-control', 'placeholder' => '사업주')) }}
            
            {{ Form::label('country', '발주국') }}
            {!! Form::select('country', $countries , null ,['class' => 'form-control', 'placeholder' => '국가 선택']) !!}

            {{ Form::label('pic', '담당PM') }}
            {{ Form::text('pic', null ,['class' => 'form-control', 'placeholder' => 'PM']) }}

            {{ Form::label('contract_filename', '계약서') }}
            {{ Form::file('contract_filename', $attributes=['class' => 'form-control'] ) }}

            {!! Form::label('memo', '메모', []) !!}
            <input type="textarea" name="memo" id="ckeditor" class="form-control">

            {{ Form::submit('등록', ['class' => 'form-control btn-success', 'style' => 'margin-top: 20px;' ]) }}
        {!! Form::close() !!}
    </div>
</div>

@include('partials.ckeditor')

<script type="text/javascript">
$(document).ready(function(){
    #('ep').hide();
    $('ep').click(function()){
        $().toggle();
    }
});
// Always provide paths that start with a slash character ("/").

</script>
        
@endsection
