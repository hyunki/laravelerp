@if (count($addendums) > 0)
    <h4>계약수정내역</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>변경코드</th>
            <th>계약번호</th>
            <th>계약명</th>
            <th>시작일</th>
            <th>종료일</th>
            <th>증감액</th>
            <th>변경계약일</th>
            <th>edit</th>
        </tr>
        @foreach( $addendums as $addendum)
            <tr>
	            <td><a href="{{ route('contractaddendum.show',$addendum->id) }}">{{ $addendum->id }}</a></td>
	            <td>{{ $addendum->type }}</td>
	            <td>{{ $addendum->revised_no }}</td>
	            <td>{{ $addendum->revised_name }}</td>
	            <td>{{ $addendum->revised_startdate }}</td>
	            <td>{{ $addendum->revised_enddate }}</td>
	            <td>
	                @if (!$addendum->currency)
	                @else
	                  {{ App\Currency::where('id', $addendum->currency)->get()['0']['code']}}
	                @endif
	                {{ number_format((float)$addendum->amount,2,'.',',') }}</td>
	            <td>{{ $addendum->revised_date }}</td>
	            <td><a href="{{ route('contractaddendum.edit',$addendum->id) }}"><span class="glyphicon-edit"></span></a></td>
            </tr>
            @if (!$addendum->memo)
            @else
	            <tr>
	            	<td></td><td colspan="7" col>{!! $addendum->memo !!}</td>
	            </tr>
            @endif
            {{-- ['0']['code'] --}}
        @endforeach
        
    </table>
@else
    <span></span>
@endif