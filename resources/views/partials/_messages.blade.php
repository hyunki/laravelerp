@if (Session::has('success'))
	<div class="alert alert-success">
		<strong>성공: </strong>{{ Session::get('success') }}
	</div>	
@endif

@if (Session::has('destroy'))
	<div class="alert alert-success">
		<strong>삭제완료 </strong>{{ Session::get('success') }}
	</div>	
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <li>{{ print_r($_POST) }}</li>
            @endforeach
        </ul>
    </div>
@endif