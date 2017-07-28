<div>
<h4>입퇴사 기록 <a href="{{ url('/employeejoin/create/'.$employee->id) }}" class="btn btn-primary">추가</a>
</h4>
</div>
	<table class="table">
    	<thead>
    		<th>입사일</th>
    		<th>퇴사일</th>
    		<th>퇴사사유</th>
    		<th>근로계약서</th>
    		<th>사직서</th>
    		<th>기능</th>
    	</thead>
@if (count($employee->joins) > 0)

    	<tbody>
	    @foreach($employee->joins as $join)

	        <tr>
				<td>{{ $join->joined_at }}</td>
				<td>{{ $join->resigned_at }}</td>
				<td>{{ $join->resign_reason }}</td>
				<td>
					@if (is_null($join->contract_filename))
						<p>자료없음</p>
					@else
						<a href="{{ URL::to('uploads') }}/employee/contracts/{{ $join->contract_filename }}">다운로드</a> 
					@endif
				</td>
				<td>
					@if (is_null($join->resignation_filename))
						<p>자료없음</p>
					@else
						<a href="{{ public_path() }}.'/'.{{ $join->resignation }}">다운로드</a> 
					@endif
				</td>
				<td>
					<a href="{{ route('employeejoin.edit',['employeeid'=> $employee->id, 'id'=>$join->id]) }}"><span class="glyphicon glyphicon-edit"></span></a>
					
				</td>
			</tr>
	    @endforeach
		</tbody>
	</table>

@else
<tbody>
	<td colspan="5"><p>기록없음</p></td>
</tbody>

</table>


@endif
