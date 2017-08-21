<!-- app/views/asset/list.blade.php -->
@extends('layouts.main')
@section('content')

<div class="col-md-10 col-md-offset-1 ">
    <h1>자산목록</h1>
    <a class="btn btn-info" href="{{ route('asset.create') }}">자산추가</a>
    <hr>
    <table class="table table-condensed table-hover table-bordered table-striped">
    </table>


</div>
@endsection