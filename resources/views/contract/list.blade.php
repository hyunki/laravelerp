<!-- app/views/contract/contract.blade.php -->
@extends('layouts.main')
@section('title','공사계약서 목록')
@section('content')

<div class="col-md-10 col-md-offset-1 ">
    <h2>공사계약 목록</h2>
    <hr>
    <a class="btn btn-info" href="{{ route("contract.create") }}">계약추가</a>
    <table class="table table-hover table-striped" id="DataTable">
	
            <thead>
                {{-- <th class="text-center">ID</th> --}}
                <th class="text-center">계약번호</th>
                <th>공사코드</th>
                <th class="text-center">계약명</th>
                {{-- <th class="text-center">코드</th> --}}
                <th class="text-center">계약일자</th>
                <th class="text-center">계약금액</th>
{{--                 <th class="text-center">EP금액</th>
                <th class="text-center">C금액</th> --}}
                <th class="text-center">발주처</th>
                {{-- <th class="text-center">사업주</th> --}}
                <th class="text-center">국가</th>
                <th class="text-center">첨부</th>
                <th class="text-center">변경</th>
                <th>변경횟수</th>
                <th>보증서(건)</th>
            </thead>
            <tbody>
                @foreach ($contracts as $contract) 
                    <tr>
                        {{-- <th>{{$contract->id}}</th> --}}
                        <td><a href="{{ route('contract.show', $contract->id) }}">{{ $contract->contractNo }}</a></td>
                        <td>{{ $contract->code }}</td>
                        <td>
                        <span data-toggle="tooltip" title="{{ $contract->name }}" >
                         {{--   {{ $contract->name }} --}}
                            {{ mb_substr($contract->name, 0 , 100 ) }} 
                            {{ (strlen($contract->name) > 100 ? " ..." : "") }}
                        </span></p>
                        </td>
                        {{-- <td>{{$contract->code}}</td> --}}
                        <td><p>{{$contract->date}}</p></td>
                        <td>
                            <div style="text-align:left" class="col-md-3">
                            @foreach ( \App\Currency::where('id',$contract->cur1)->select('code')->get() as $currency)
                                {{$currency->code}}
                            @endforeach
                            </div>
                            <div class="col-md-9" style="text-align:right;">
                                {{ number_format((float)$contract->TotalAmount,2) }}
                            </div>
                        </td>
{{--                         <td>
                            <div style="text-align:left" class="col-md-3">
                            @foreach ( \App\Currency::where('id',$contract->cur2)->select('code')->get() as $currency)
                                {{$currency->code}}
                            @endforeach
                            </div>
                            <div class="col-md-9" style="text-align:right;">
                                {{ number_format((float)$contract->epAmount,2) }}
                            </div>
                        </td>
                        <td>
                            <div style="text-align:left" class="col-md-3">
                            @foreach ( \App\Currency::where('id',$contract->cur2)->select('code')->get() as $currency)
                                {{$currency->code}}
                            @endforeach
                            </div>
                            <div class="col-md-9" style="text-align:right;">
                                {{ number_format((float)$contract->cAmount,2) }}
                            </div>
                        </td> --}}
                        <td data-toggle='tooltip' title="{{ $contract->contractor }}">
                            {{ mb_substr($contract->contractor,0, 10) }}
                            {{ strlen($contract->contractor) > 12 ? "..." : ""  }}
                        </td>
                        {{-- <td>{{$contract->owner}}</td> --}}
                        <td>
                            @foreach ( \App\Country::where('id',$contract->country)->select('alpha3','nameKor')->get() as $country)
                                <span title="{{$country->korName}}">{{$country->alpha3}}</span>
                            @endforeach
                        </td>

                        <td>
                        @if (!is_null($contract->file_name))
                            <a href="{{ $contract->file_name }}"><span class="glyphicon glyphicon-download"></span></a>
                        @endif
                        </td>
                        <td>
                            <a href="{{ route('contract.edit' , $contract->id ) }}"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                        
                        <td>{{ count($contract->ContractsAddendum) }}</td>
                        <td>
                            <a href="{{ route('contract.show', $contract->id) }}">{{ count($contract->bonds) }} </a>
                        </td>
                    </tr>
                @endforeach
{{-- 
            <tr>
                <td colspan="2">총{{$contracts->count('id')}} 건</td>
                <td colspan="3" style="align-items: center;">총합계</td>
                <td style="text-align: right;">
                    {{ number_format((float) $contract->TotalAmount,2) }}
                </td>
                <td style="text-align: right;">
                    {{ number_format((float) $contract->epAmount,2) }}
                </td>
                <td style="text-align: right;">
                    {{ number_format((float) $contract->cAmount,2) }}
                </td>
                <td colspan="6"> </td>
            </tr>   --}}
       </tbody>
    </table>

    <div class="text-center">
        {{-- {!! $contracts->links(); !!} --}}
    </div>

</div>

@endsection


@section('javascript')
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

$('.typeahead').typeahead({
    highlight: true,
    minLength: 1
}, {
  name: 'projectName',
  limit: 10,
  source: substringMatcher(projectName)
});

$(document).ready(function(){
    $('#DataTable').DataTable({
        "order":[[3,"계약일자"]]
    });
});

</script>



@endsection

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatable.css') }}">
@endsection
