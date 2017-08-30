@extends('layouts.main')
@section('content')

<div class="col-md-8 col-md-offset-2 ">

@include('partials._messages')
    <div class="col-md-12">
        
    </div>
    <br>
    <div class="col-md-2">
        <div>
        <table>
            <tr><th>입력일</th></tr>
            <tr><td>{{$contract->created_at }} </td></tr>
            <tr><th>수정일</th></tr>
            <tr><td>{{$contract->updated_at }} </td></tr>
        </table>
        <a href="{{route('contract.index')}}" class="btn btn-default btn-block" >목록</a>

        <a href="{{ route('contract.create')}}" class="btn btn-info btn-block">계속입력</a>

        <a href="{{ route('bond.create', ['contract_id' => $contract->id]) }}" class="btn btn-default btn-block">지급보증서등록</a>

        <a href="{{ route('contractaddendum.create', ['contract_id' => $contract->id]) }}" class="btn btn-default btn-block">수정계약서등록</a>

        <a href="{{ route('contract.edit' , $contract->id ) }}" class="btn btn-default btn-block"  >내용수정</a>

        <a href="{{ route('contract.destroy', $contract->id ) }}" class="btn btn-danger btn-block" >계약삭제</span></a>
        </div>
    </div>
    <div class="col-md-10 a4">
    	<div class="print">
	        <h1>{{ $contract->name}}</h1>
	        <div class="form-group">
		        <table class="table">
		            <tr>
		                <th>계약서 ID</th>
		                <td> {{ $contract->id }}</td>
		            </tr>
		            <tr>
		                <th>계약서 번호</th>
		                <td> {{ $contract->contractNo }}</td>
		            </tr>
		            <tr>
		                <th>공사코드</th>
		                <td> {{ $contract->code }}</td>
		            </tr>
		            <tr>
		                <th>Scope</th>
		                <td>
		                    @if( $contract->E == 1)
		                    E
		                    @endif
		                    @if( $contract->P == 1)
		                    P
		                    @endif
		                    @if( $contract->C == 1)
		                    C
		                    @endif
		            </tr>
		            <tr>
		                <th>공사계약일</th>
		                <td> {{ $contract->date }}</td>
		            </tr>
		            <tr>
		                <th>공사완료일</th>
		                <td>{{ $contract->completionDate }}</td>
		            </tr>
		            <tr>
		                <th>EP납기일</th>
		                <td> {{ $contract->DeliveryDate_EP }}</td>
		            </tr>
		            <tr>
		                <th>C납기일</th>
		                <td> {{ $contract->DeliveryDate_C }}</td>
		            </tr>
		            <tr>
		                <th>EP금액</th>
		                <td>{{ $contract->curr2['code']}} {{ $ep = number_format((float)$contract->epAmount,2,'.',',') }} </td>
		                {{-- 2번 불러오는게 안됨  --}}
		            </tr>
		            <tr>
		                <th>C 금액</th>
		                <td>{{ $contract->curr3['code']}} {{ $c = number_format((float)$contract->cAmount,2,'.',',') }} 
		            </td>
		            
		            <tr>
		                <th>계약금액</th>
		                <td><b>
		                    {{ $contract->curr1['code']}} {{ number_format((float) $contract->TotalAmount,2,'.',',') }} 

		                </b></td>
		            </tr>
					<tr>
		            	<th>
		            		변경계약금액 합계
		            	</th>
		            	<td>
		            		{{ $contract->curr1['code'] }}
		            		 {{ number_format($amendedamount,2,'.',',') }}
		            	</td>
		            </tr>
		            <tr>
		            	<th>
		            		총계약금액
		            	</th>
		            	<td>
		            		<b>
		                    {{ $contract->curr1['code'] }} {{ number_format($totalamount,2,'.',',') }}
		                    </b>
		            	</td>
		            </tr>
		            </tr>
		            <tr>
		                <th>발주처</th>
		                <td>{{$contract->contractor }} </td>
		            </tr>
		            <tr>
		                <th>발주국</th>
		                <td>
		                    @foreach( \App\Country::where('id' , $contract->country)->get() as $country)
		                        {{ $country->alpha3 }}  ( {{$country->nameKor}} )
		                    @endforeach
		                </td>
		            </tr>
		            <tr>
		                <th>사업주</th>
		                <td>{{$contract->owner }} </td>
		            </tr>
		            <tr>
		                <th>PM</th>
		                <td>{{$contract->pic }} </td>
		            </tr>
		            
		           
		            <tr>
		                <th>계약서</th>
		            @if (is_null($contract->file_name))
		                <td>파일없음</td>
		            @else
		                <td>
		                	<a href="{{ asset( $contract->file_name) }} ">다운로드</a>
		                	{{ Helper::file_size_path($contract->file_name) }}
	                	</td>
		            @endif
		            </tr>
		            <tr>
		                <th >Memo</th>
		                 <td colspan="2">{!! $contract->memo !!}</td>
		            </tr>

        </table>

       
        {{-- 계약수정 내역 보여줌 --}}
        @include('contract.addendum_inherite')
        {{-- 지급보증서 보여줌 --}}
        @include('contract.bonds_inherite')
        
        

            </div>
             {{-- End of Form Group --}}
        </div>
        {{-- End of col-md-9 --}}
@endsection