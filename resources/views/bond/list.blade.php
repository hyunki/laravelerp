<!-- app/views/contract/contract.blade.php -->
@extends('layouts.main')

@section('content')


<div class="col-md-10 col-md-offset-1 ">
@include('partials._messages')
    <h1>지급보증 조회</h1>
    <a class="btn btn-info" href="{{ route("bond.create") }}">계약추가</a>
    <hr>
    <table class="table table-condensed table-hover table-striped">

            <thead>
                <th class="text-center">ID</th>
                <th class="text-center">계약ID</th>
                <th class="text-center">발행기관</th>
                <th class="text-center">분류</th>
                <th class="text-center">보증서종류</th>
                <th class="text-center">양식</th>
                <th class="text-center">대외</th>
                <th class="text-center">Mail</th>
                <th class="text-center">수익자</th>
                <th class="text-center">보증서번호</th>
                <th class="text-center">보증금액</th>
                {{-- <th class="text-center">수수료</th> --}}
                <th class="text-center">발행일</th>
                <th class="text-center">시작일</th>
                <th class="text-center">종료일</th>
                {{-- <th class="text-center">회수일</th> --}}
                <th class="text-center">회수</th>
                <th class="text-center">상태</th>
                {{-- <th class="text-center">메모</th> --}}
{{--                 <th class="text-center">등록일</th>
                <th class="text-center">수정일</th> --}}
                <th></th>
            </thead>
            <tbody>
                @foreach ($bonds as $bond) 
                    <tr>
                        <th>{{ $bond->id }}</th>

                        <th>
                        <span title="{{ App\Contract::where('id',$bond->contract_id)->select('name')->get() }}"><a href="{{ route('contract.show',$bond->contract_id) }}">{{ $bond->contract_id }}</a></span>
                        </th>
                        <td>{{ $bond->Issuer }}</a></td>
                        <td>{{ $bond->Category }}</td>
                        <td>{{ $bond->Type }} </td>
                        <td>{{ $bond->Format }}</td>
                        <td>
                            @if($bond->Outbound == 1 )
                               <span class="glyphicon glyphicon-ok"></span>
                            @endif
                        </td>
                        <td>
                            @if($bond->Method == 1 )
                               <span class="glyphicon glyphicon-ok" title="Mail"></span>
                            @endif
                        </td>
                        <td>{{ $bond->Beneficiary }} </td>
                        <td><a href="{{ route('bond.show',$bond->id)}} ">{{ $bond->LgNumber }}</a></td>
                        
                        {{-- 보증금 --}}
                        <td> 
                            <div style="text-align:left" class="col-md-3">
                                @if ($bond->BondCurrency == '0')
                                    {{ '' }}
                                @else
                                    {!! App\Currency::where('id',$bond->BondCurrency)->get()['0']['code']!!}
                                @endif
                            </div>
                            <div class="col-md-9" style="text-align:right;">
                                {{ number_format((float)$bond->Amount,2) }}
                            </div>
                        </td>
                        {{-- <td> 수수료
                            <div style="text-align:left" class="col-md-3">
                                @if ($bond->FeeCurrency == '0')
                                    {{ '' }}
                                @else
                                    {!! App\Currency::where('id',$bond->FeeCurrency)->get()['0']['code']!!}
                                @endif

                            </div>
                            <div class="col-md-9" style="text-align:right;">
                                {{ number_format((float)$bond->Fee,2) }}
                            </div>
                        </td> --}}
                        @if (!is_null($bond->IssuingDate))
                            <td>{{ $bond->IssuingDate->format('Y-m-d') }}</td>
                            @else <td></td>
                        @endif
                        @if (!is_null($bond->StartingDate))
                            <td>{{ $bond->StartingDate->format('Y-m-d') }}</td>
                            @else <td></td>
                        @endif
                        @if (!is_null($bond->EndingDate))
                            <td>{{ $bond->EndingDate->format('Y-m-d') }}</td>
                            @else <td></td>
                        @endif
                        
                        <td>
                            @if($bond->Validity == 1)
                            <span class="glyphicon glyphicon-ok" title="{{ $bond->RetrievalDate }}"></span>
                            @endif
                        </td>
                        <td>{{$bond->status}}</td>
                        {{-- <td>{{$bond->Memo}}</td> --}}
{{--                         <td>{{$bond->created_at}}</td>
                        <td>{{$bond->updated_at}}</td> --}}
                        <td>

                            <a class="btn btn-alert" href="{{ route('bond.edit' , $bond->id ) }}" value="update"><span class="glyphicon glyphicon-edit"></span> </a>
                        </td>

                    </tr>
                @endforeach

       </tbody>
    </table>

    <div class="text-center">
    </div>

</div>
@endsection