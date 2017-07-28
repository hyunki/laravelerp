@extends('layouts.main')

@section('content')

<div class="container">
@include('partials._messages')

{!! Form::open(['route'=>'employeejoin.store']) !!}

{!! Form::hidden('id', $id, []) !!}
{!! Form::label('joined_at','입사일', []) !!}
{!! Form::date('joined_at', 'y-m-d', []) !!}

<button type="submit"></button>

{!! Form::close() !!}


@endsection