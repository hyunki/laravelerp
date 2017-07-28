@extends('layouts.main')
@section('content')

<div class="col-md-8 col-md-offset-2 ">

@include('partials._messages')

    <div class="col-md-3">
        <div class="col-md-5">
            <a href="{{route('bond.index')}}" class="btn btn-default">목록</a>
        </div>
        <div class="col-md-7">
            <a class="btn btn-alert" href="{{ route('bond.edit' , $bond->id ) }}">
                Edit</a>
            
            <a class="btn btn-danger" href="{{ route('bond.destroy', $bond->id ) }}">
                Delete</span></a>
        </div>
        
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
                {{ App\Contract::where('id', $bond->contract_id)->get()['0']['name'] }}
            @endif
        </h3>
        <hr>
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
                        ({{ $bond->EndingDate->diffInDays($bond->StartingDate) }}일간) 
                </td>
                
            </tr>
            
            <tr>
                <th>보증금액</th>
                <td>
                    {{ App\Currency::where('id',$bond->BondCurrency)->get()['0']['code']}}
                    {{ number_format($bond->Amount,2) }}
                </td>

            </tr>
            <tr>
                <th>보증수수료</th>
                <td>
                    {{ $bond->curr2['code'] }}
                    {{ number_format($bond->Fee,2) }}
                </td>
            </tr>
            
            <tr>
                <th>보증서 회수일</th>
                <td>
                    @if(!is_null($bond->EndingDate))
                        {{ $bond->EndingDate->format('Y-m-d') }}
                    @endif
                </td>
            </tr>
            
            <tr>
                <th>회수</th>
                 <td>  @if($bond->Validity == 1)
                            <span class="glyphicon glyphicon-ok" title="{{ $bond->RetrievalDate }}"></span>
                            @endif</td> {{ $bond->Validity }}
            </tr>
            <tr>
                <th>상태</th>
                <td>
                    {{$bond->status }}
                </td>
            </tr>
            <tr>
                <th>Memo</th>
                <td>{{$bond->Memo }} </td>
            </tr>
            
            <tr>
                <th></th>
                <td> </td>
            </tr>
        </table>
    </div>
</div>


@endsection