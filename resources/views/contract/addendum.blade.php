@extends('layouts.main')
@section('title','계약수정내용 입력') {{-- yield --}}

@section('content')

<div class="container">
@include('partials._messages')

    <div class="row">
        <h1>변경계약내용 입력</h1>
        {!! Form::open(array('route' => 'contractaddendum.store', 'files'=>'true')) !!}
            {{ Form::label('contract_id' , '원계약번호')}}
            {{ Form::select('contract_id', $contracts, null, ['class' => 'form-control', 'placeholder' => '계약번호','style' => 'ime-mode:inacitve']) }}

            {{ Form::label('revised_name', '수정계약서명') }}
            {{ Form::text('revised_name', null, array('class' => 'form-control', 'placeholder' => '계약명')) }}

            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('revised_date', '변경계약일') }}
                    {{ Form::date('revised_date', \Carbon\Carbon::now(), array('class' => 'form-control' , 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('revised_startdate', '변경 계약시작일') }}
                    {{ Form::date('revised_startdate', null, array('class' => 'form-control', 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('revised_enddate', '변경 계약종료일') }}
                    {{ Form::date('revised_enddate', null, array('class' => 'form-control', 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}
                </div>

            </div>

            <div class="c form-group">
               {{ Form::label('amount', '증감액') }}
                <div class="form-group form-inline">
                    {{ Form::select('cur1', $currencies , null ,array('class' => 'form-control dropdown', 'placeholder' => '통화선택')) }}
                    {{ Form::text('amount', null, array('class' => 'form-control', 'placeholder' => '계약금액')) }}
                 </div>
                
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
