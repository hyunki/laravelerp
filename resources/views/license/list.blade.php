<!-- app/views/contract/contract.blade.php -->
{{-- 라이선스 list --}}
@extends('layouts.main')

@section('content')

<div class="col-md-10 col-md-offset-1 ">
    <h1>라이선스 계약 내역</h1>
    
    <div id="the-basics">
    <a class="btn btn-info" href="{{ route("license.create") }}">계약추가</a>
        {{-- {!! Form::open( route('contract.search') )  !!} --}}
          <input class="typeahead no-clear search-typehead" type="text" placeholder="계약명" name="keyword">
          <button type="submit">검색</button>
          {{-- {!! form::close() !!} --}}
    </div>
    <hr>
    <table class="table table-condensed table-hover table-striped table-bordered table-condensed">

        <thead>
            <th>사업장</th>
            <th>software</th>
            <th>version</th>
            <th>시리얼</th>
            <th>수량</th>
            <th>구입일</th>
            <th>구입가</th>
            <th>만료일</th>
            <th>재설치</th>
            <th>판매자</th>
            <th>기능</th>
        </thead>
        <tbody>
            @foreach ($rows as $row) 
                {{ $row->company_id }}
                {{ $row->software }}
                {{ $row->name }}
                {{ $row->serial }}
                {{ $row->seats }}
                {{ $row->purchase_date }}
                {{ $row->purchase_price }}
                {{ $row->termination_date }}
                {{ $row->supplier_id }}
            @endforeach

       </tbody>
    </table>

    <div class="text-center">
    </div>

</div>

@include('partials._javascript')


</script>
@endsection