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
            <th>회수</th>
            <th>상태</th>
        </tr>
        @foreach( $bonds as $bond)
            <tr>
                <td>{!! $bond->Issuer !!}</td>
                <td>{!! $bond->Category !!}</td>
                <td>{!! $bond->Type !!}</td>
                <td>
                    <a href="{!! route('bond.show',$bond->id) !!}" class="hidden-print">
                        {{ $bond->LgNumber }}
                    </a>
                    <p style="display: none">{{ $bond->LgNumber }}</p>
                </td>
                <td>
                    {!! App\Currency::where('id',$bond->BondCurrency)->get()['0']['code'] !!}
                </td>
                <td style="text-align: right">
                    {!! number_format((float) $bond->Amount ,2,'.',',')!!}
                </td>
                <td>
                    {!! (!$bond->IssuingDate) ?'' :$bond->IssuingDate->format('Y-m-d')!!}
                </td>
                <td>{!! $bond->StartingDate->format('Y-m-d')!!} ~ {!!$bond->EndingDate->format('Y-m-d')!!}</td>
                <td>
                    @if($bond->Validity == 1)
                        <span class="glyphicon glyphicon-ok" title="{!! $bond->RetrievalDate !!}"></span>
                    @endif
                    {!! (!$bond->RetrievalDate) ? '' : $bond->RetrievalDate->format('Y-m-d') !!}
                </td>
                <td>{!! $bond->status !!}</td>
            </tr>
        @endforeach
    </table>
@else

@endif
