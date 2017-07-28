@extends('layouts.app')

@section('content')
<div class="container container-fluid">
<h1>Code 목록</h1>

<a href="{{ route('code.') }}" class="btn btn-primary">코드추가</a>
<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Table</th>
        <th>Field</th>
        <th>Value</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Edit</th>
    </tr>

@foreach($codes as $code)
<tr>
    <td>{{ $code->id }}</td>
    <td>{{$code->tableName}}</td>
    <td>{{$code->fieldName}}</td>
    <td>{{$code->code_id}}</td>
    <td>{{$code->codeValue}}</td>
    <td>{{$code->active}}</td>
    <td>{{$code->created_at}}</td>
    <td>{{$code->updated_at}}</td>
    <td><button type="submit" class="btn btn-default" value="_edit">수정</button></td>
    <td><button type="submit" class="btn btn-default" value="_delete">삭제</button></td>
</tr>
@endforeach

</table>
@endsection
</div>