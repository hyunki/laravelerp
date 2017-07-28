@extends('layouts.main')
@section('title','입퇴사 정보수정')
@section('content')

<div class="container">
@include('partials._messages')

@foreach ($employee as $employee)
<h1>{{$employee->lastName}}{{ $employee->firstName}}</h1>
@endforeach
@foreach ($joins as $join)

{!! Form::model($join , ['route' => ['employeejoin.update', 'files'=>'true']]) !!}
	<input type="hidden" name="id" value="{{ $join->id }}">
	{!! Form::label('joined_at', '입사일', []) !!}
	{!! Form::text('joined_at', 'DEFAULT', []) !!}

	{!! Form::label('resigned_at', '퇴사일', []) !!}
	{!! Form::text('resigned_at', 'DEFAULT', []) !!}

	{!! Form::label('resign_reason', '퇴사이유', []) !!}
	{!! Form::text('resign_reason', null, []) !!}

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{!! Form::submit('수정', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endforeach

@endsection