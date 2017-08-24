<!-- app/views/asset/list.blade.php -->
@extends('layouts.main')
@section('content')

<div class="col-md-10 col-md-offset-1 ">
    <h1>자산목록</h1>
    <a class="btn btn-info" href="{{ route('asset.create') }}">자산추가</a>
    <hr>
    <table class="snipe-table">
		<tr>
		<th></th>
		<td></td>
		</tr>
	{{ print_r($assets) }}


    </table>
                <table
                name="assets"
                {{-- data-row-style="rowStyle" --}}
                data-toolbar="#toolbar"
                class="table table-striped snipe-table"
                id="table"

                data-cookie="true"
                data-click-to-select="true">
                  



@include ('partials.bootstrap-table', [
    'exportFile' => 'assets-export',
    'search' => true,
    'multiSort' => true
])


@endsection