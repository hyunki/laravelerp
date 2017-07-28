<h4>프로필 <a href="{{route('profile.create') }}{{ '/'.$employee->id }}" class="btn btn-primary">추가</a></h4>
<?php
function get_cod($t,$code)
{
	foreach ( \App\Code::where('tableName','profile')->where('fieldName',$t)->where('code_id',$code)->get() as $codeValue)
		$codeValue->codeValue;
}
?>

<table class="table">
	<thead>
		<th>사업장</th>
		<th>근무지</th>
		<th>부서</th>
		<th>직위</th>
		<th>직함</th>
	</thead>
	<tbody>

@foreach ($employee->profiles as $profile)
<tr>
	<td>
	{{-- {{ get_cod('businessPlace', $status->dutyPlace )}} --}}
{{-- 		@foreach ( \App\Code::where('tableName','profile')->where('fieldName','businessPlace')->where('code_id',$status->businessPlace)->get() as $codeValue)
		{{ $codeValue->codeValue }}
		@endforeach --}}
	</td>
	<td>
		@foreach ( \App\Code::where('tableName','profile')->where('fieldName','dutyPlace')->where('code_id',$profile->dutyPlace)->get() as $codeValue)
		{{ $codeValue->codeValue }}
		@endforeach
	</td>
	<td>
		@foreach ( \App\Code::where('tableName','profile')->where('fieldName','BusinessPlace')->where('code_id',$profile->department)->get() as $codeValue)
		{{ $codeValue->codeValue }}
	@endforeach
	</td>
	<td>
		@foreach ( \App\Code::where('tableName','profile')->where('fieldName','title')->where('code_id',$profile->title)->get() as $codeValue)
		{{ $codeValue->codeValue }}
		@endforeach
	</td>
	<td>
		@foreach ( \App\Code::where('tableName','profile')->where('fieldName','position')->where('code_id',$profile->position)->get() as $codeValue)
		{{ $codeValue->codeValue }}
		@endforeach
	</td>
</tr>

@endforeach


</tbody>
</table>