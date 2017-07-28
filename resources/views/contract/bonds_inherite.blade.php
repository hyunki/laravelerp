<?php
    $bonds = App\Contract::find($contract->id)->bonds;
?>
@if (count($bonds) > 0 )

    <h4>발행된 보증서</h4>
    <table class="table table-">
        <tr>
            <th>발행기관</th>
            <th>보증종목</th>
            <th>보증종류</th>
            <th>보증서번호</th>
            <th colspan="2" style="text-align: center">보증금액</th>
            <th>발급일</th>
            <th>보증기간</th>
        </tr>
        @foreach( $bonds as $bond)
            <tr>
                <td>{{ $bond->Issuer }}</td>
                <td>{{ $bond->Category }}</td>
                <td>{{ $bond->Type }}</td>
                <td><a href="{{ route('bond.show',$bond->id) }}">{{$bond->LgNumber}}</a></td>
                <td>
                    {{ App\Currency::where('id',$bond->BondCurrency)->get()['0']['code'] }}
                </td>
                <td style="text-align: right">
                    {{ number_format((float) $bond->Amount ,2,'.',',')}}
                </td>
                <td>{{$bond->IssuingDate}}</td>
                <td>{{$bond->StartingDate}} ~ {{$bond->EndingDate}}</td>
            </tr>
        @endforeach
    </table>
@else

@endif
