@extends('layouts.main')
@section('title', 'test')
@section('content')

<div class="col-md-8 col-md-offset-2 ">

@include('partials._messages')

    <div class="col-md-3">
            <a href="{{route('bond.index')}}" class="btn btn-default btn-block">목록</a>
            <a href="{{ route('bond.edit' , $bond->id ) }}" class="btn btn-info btn-block" >Edit</a>
            <a href="{{ route('bond.destroy', $bond->id ) }}" class="btn btn-danger btn-block" >Delete</span></a>
        
        <table class="table">
            <tr>
                <th>입력일</th>
                <td>{{$bond->created_at }} </td>
            </tr>
            <tr>
                <th>수정일</th>
                <td>{{$bond->updated_at }} </td>
            </tr>
        </table>
    </div>
    <div class="col-md-9">
        <h1>{{ $bond->LgNumber}}</h1>
        <h3>
            @if ( App\Contract::where('id', $bond->contract_id)->get() == '[]' )
                {{ '' }}
            @else
                
                <a href="{{ route('contract.show', ['id' => $bond->contract_id]) }}">
                    {!! App\Contract::where('id', $bond->contract_id)->get()['0']['name'] !!}
                </a>
            @endif
        </h3>
    <div class="form-group">
        <table class="table">
            <tr>
                <th>발행자 </th>
                <td>{{ $bond->Issuer }}</a></td>
            </tr>
            <tr>
                <th>보증종목</th>
                <td>{{ $bond->Category }}</td>
            </tr>
            <tr>
                <th>보증서종류</th>
                <td>{{ $bond->Type }} </td>
            </tr>
            <tr>
                <th>양식</th>
                <td>{{ $bond->Format }}</td>
            </tr>
            <tr>
                <th>대외 여부</th>
                <td>{{ $bond->Outbound }}</td>
            </tr>
            <tr>
                <th>통지방법</th>
                <td>
                    {{ $bond->Method }}  
                </td>

            </tr>   
            <tr>
                <th>수익자</th>
                <td>{{ $bond->Beneficiary }} </td>
            </tr>
            <tr>
                <th>보증서 번호</th>
                <td>{{ $bond->LgNumber }} </td>
            </tr>

            <tr>
                <th>보증서 발행일</th>
                <td> 
                    @if(!is_null($bond->IssuingDate))
                        {{ $bond->IssuingDate->format('Y-m-d') }}
                    @endif
                </td>
            </tr>
            <tr>
                <th>보증 기간</th>
                <td>
                    @if(!is_null($bond->StartingDate))
                        {{ $bond->StartingDate->format('Y-m-d') }}
                    @endif ~ 
                    @if(!is_null($bond->EndingDate))
                            {{ $bond->EndingDate->format('Y-m-d') }}
                    @endif
                        ({{ $bond->EndingDate->diffInDays($bond->StartingDate) }} 일간) 
                </td>
                
            </tr>
            
            <tr>
                <th>보증금액</th>
                <td>
                    @if (!isset(App\Currency::where('id',$bond->BondCurrency)->get()['0']['code']))
                    @else
                    {{ App\Currency::where('id',$bond->BondCurrency)->get()['0']['code'] }}
                    @endif
                    {{ number_format($bond->Amount,2) }}
                </td>

            </tr>
            <tr>
                <th>보증수수료</th>
                <td>
                    @if (!isset(App\Currency::where('id',$bond->FeeCurrency)->get()['0']['code']))
                    @else
                    {{ App\Currency::where('id',$bond->FeeCurrency)->get()['0']['code'] }}
                    @endif
                    {{ number_format($bond->Fee,2) }}
                </td>
            </tr>
            
            <tr>
                <th>회수</th>
                 <td>   @if($bond->Validity == 1)
                            <span class="glyphicon glyphicon-ok" title="{{ $bond->RetrievalDate }}"></span>
                        @endif 
                        @if(is_null($bond->RetrievalDate))
                        @else
                            <span> 회수일:</span>
                            {{ $bond->RetrievalDate->format('Y-m-d') }}
                        @endif
                </td> 
            </tr>
            
          
            <tr>
                <th>상태</th>
                <td>
                    {{$bond->status }}
                </td>
            </tr>
            <tr>
                <th >Memo</th>
                <td class="list-group-item-text">{!! $bond->memo !!} </td>
            </tr>
            
            <tr>
                <th></th>
                <td> </td>
            </tr>
        </table>
    </div>
</div>
{{-- 본드 수정내역 --}}


@endsection