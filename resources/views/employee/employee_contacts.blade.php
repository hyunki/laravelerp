<div>
<h4>연락처 </h4> 
</div>


@foreach ($employee->phones as $phones)
<p>
<span>{{ $phones->type }}</span>
+{{ $phones->country_code }}
{{ $phones->area_code }}
-{{ $phones->area_code }}
-{{ $phones->exchange }}
-{{ $phones->station }}
	@if (!$phones->extension)
	@else
		-{{ $phones->extension }}
	@endif
</p>
@endforeach