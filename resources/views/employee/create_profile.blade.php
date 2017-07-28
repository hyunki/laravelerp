@extends('layouts.main')
@section('content')

<div class="col-md-8 col-md-offset-2 ">

@include('partials._messages')
    <div class="col-md-12">
        <a href="{{route('employee.index')}}" class="btn btn-default">목록</a>
    </div>
    <br>
    <div class="col-md-2">
{{--             <a class="btn btn-alert" href="{{ route('employee.edit' , $employee->id ) }}">
                Edit</a>
            
            <a class="btn btn-danger" href="{{ route('employee.destroy', $employee->id ) }}">
                Delete</span></a> --}}
    </div>
    <div class="col-md-10">
        <h1>{{$employee->lastName}}{{ $employee->firstName}}</h1>
		<hr>