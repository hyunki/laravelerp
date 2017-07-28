@extends('layouts.main')

@section('content')

    <div class="col-md-8 col-md-offset-2">
    @include('partials._messages')
        {{ Form::label('id' , 'ID')}}
        {!! Form::model($bond, ['route' => ['bond.update' , $bond->id]]) !!}
            {{ Form::label('contract_id' , '계약ID')}}

            {{ Form::select('contract_id', $contracts, $bond->contract_id, ['class' => 'form-control']) }}

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
            {{ Form::radio('Outbound', 1, true, ['id' => 'option1']) }} 대외</label>
            <label for="option2">
            {{ Form::radio('Outbound', 0, null, ['id' => 'option2']) }} 대내</label>
            <br>

            {{ Form::label('Method', '통지방법' ) }}
            {{ Form::select('Method', ['1'=>'Mail','2'=>'SWIFT'], null , array('class' => 'form-control', 'placeholder' => '선택')) }}
            
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
            <div class="form-group form-inline">
            {{ Form::label('IssuingDate', '보증서 발행일') }}
            {{ Form::date('IssuingDate', $bond->IssuingDate, array('class' => 'form-control', 'max' => '9999-12-31')) }}

            
            </div>

            <div class="form-group form-inline">
            {{ Form::label('StartingDate', '보증 시작일') }}
            {{ Form::date('StartingDate', $bond->StartingDate, array('class' => 'form-control', 'max' => '9999-12-31')) }}

            {{ Form::label('EndingDate', '만기일') }}
            {{ Form::date('EndingDate', $bond->EndingDate, array('class' => 'form-control', 'max' => '9999-12-31')) }}
            </div>


            {{ Form::label('Validity', '회수여부') }}
            <div class="form-group form-inline">
            <label>
            은행반납:
            <input type="checkbox" name="Validity" value="1">
            </label>
            {{ Form::label('RetrievalDate', '회수일자') }}
            {{ Form::date('RetrievalDate', $bond->RetrievalDate, array('class' => 'form-control', 'max' => '9999-12-31')) }}
            </div>

            {{ Form::label('Status', '상태 | Status') }}
            {{ Form::text('Status', null, ['class' => 'form-control', 'placeholder' => '상태 | Status']) }}


            <br>
                      
            {{ Form::label('Memo', '메모 | Memo') }}
            {{ Form::textarea('Memo', null, array('class' => 'form-control', 'placeholder' => '메모 | Memo')) }}

            {{ Form::submit('등록', ['class' => 'form-control btn-success', 'style' => 'margin-top: 20px;' ]) }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! Form::close() !!}
    </div>


<script type="text/javascript">
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var projectName = [@foreach(App\Contract::select('name')->get() as $contract)
                        "{!! $contract->name !!}",
                    @endforeach];


// $('#the-basics .typeahead').typeahead({
//   hint: true,
//   highlight: true,
//   minLength: 1
// },{
//   name: 'projectName',
//   source: substringMatcher(projectName)
// });

$('.typeahead').typeahead({
    highlight: true,
    minLength: 1
}, {
  name: 'projectName',
  limit: 10,
  source: substringMatcher(projectName)
});

</script>

@endsection