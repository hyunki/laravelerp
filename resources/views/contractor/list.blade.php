<!-- app/views/contract/contract.blade.php -->
@extends('layouts.main')

@section('content')


<div class="col-md-10 col-md-offset-1 ">
@include('partials._messages')
    <h1>거래처 목록</h1>
    <a class="btn btn-info" href="{{ route("contractor.create") }}">계약추가</a>
    <hr>
    <table class="table table-condensed table-hover table-striped">

            <thead>
                <th class="text-center">ID</th>
                <th class="text-center">국가</th>
                <th class="text-center">거래처명</th>
                <th class="text-center">등록번호</th>
                <th class="text-center">업종</th>
                <th class="text-center">업태</th>
            </thead>
            <tbody>
                @foreach ($lists as $list) 
                    <tr>
                        <th>{{ $list->id }}</th>
                        <th><a href="{{ route('contractor.show',$list->id) }}">{{ $list->id }}</a></th>
                        <td>{{ $list->country }}</a></td>
                        <td>{{ $list->reg_name }}</td>
                        <td>{{ $list->reg_no }}</td>
                        <td>{{ $list->type }}</td>
                        <td>{{ $list->item }}</td>
                        <td>
                            <a class="btn btn-alert" href="{{ route('list.edit' , $list->id ) }}" value="update"> <span class="glyphicon glyphicon-edit"></span> </a>
                        </td>
                    </tr>
                @endforeach

       </tbody>
    </table>

    <div class="text-center">
    </div>

</div>

@endsection

