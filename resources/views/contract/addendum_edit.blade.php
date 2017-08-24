@extends('layouts.main')
@section('title','계약수정내용 수정') {{-- yield --}}

@section('content')

<div class="container">
@include('partials._messages')

    <div class="row">
        <h1>변경계약내용 수정</h1>
        {!! Form::model($addendum, ['route' => ['contractaddendum.update',$addendum->id], 'files'=>'true']) !!}
            {{ Form::label('contract_id' , '원계약번호')}}
            {{ Form::select('contract_id', $contracts, $addendum->contract_id, ['class' => 'form-control form-', 'placeholder' => '계약번호']) }}

            {{ Form::label('revised_no' , '수정계약서번호')}}
            {{ Form::text('revised_no', $addendum->revised_no , ['class' => 'form-control form-', 'placeholder' => '계약번호']) }}

            {{ Form::label('type', '변경사항') }}
            {{ Form::select('type', $addendum_type, $addendum->type, array('class' => 'form-control', 'placeholder' => '계약명')) }}

            {{ Form::label('revised_name', '수정계약서명') }}
            {{ Form::text('revised_name', $addendum->revised_name, array('class' => 'form-control', 'placeholder' => '계약명')) }}

            {{ Form::label('revised_startdate', '변경 계약시작일') }}
            {{ Form::date('revised_startdate', $addendum->revised_startdate, array('class' => 'form-control', 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}

            {{ Form::label('revised_enddate', '변경 계약종료일') }}
            {{ Form::date('revised_enddate', $addendum->revised_enddate, array('class' => 'form-control', 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}

            {{ Form::label('revised_date', '변경계약일') }}
            {{ Form::date('revised_date', $addendum->revised_date, array('class' => 'form-control' , 'min'=>'2002-01-01', 'max' => '9999-09-09')) }}

            <div class="form-group">
            	{{ Form::label('amount', '증감액') }}
                {{ Form::select('currency', $currencies , null ,array('class' => 'form-control dropdown', 'placeholder' => '통화선택')) }}
                {{ Form::text('amount', $addendum->amount, array('class' => 'form-control', 'placeholder' => '계약금액')) }}
             </div>
			{{-- 
            {{ Form::label('contract_filename', '계약서') }}
            {{ Form::file('contract_filename', $attributes=['class' => 'form-control'] ) }} --}}

            {!! Form::label('memo', '메모', []) !!}
            {!! Form::textarea('memo', $addendum->memo, ['class'=>'form-control']) !!}
            
			{!! Form::hidden('_method', 'PUT', []) !!}
			{!! Form::hidden('_token', csrf_token(), []) !!}
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
