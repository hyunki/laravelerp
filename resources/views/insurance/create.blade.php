@extends('layouts.main')

@section('content')
@section('title','보험계약 입력') {{-- yield --}}

<div class="container">
@include('partials._messages')

    <div class="row">
        <h1>공사계약 입력</h1>
        {!! Form::open(array('route' => 'insurance.store', 'files'=>'true')) !!}
            
        {!! Form::close() !!}
@include('partials.ckeditor')

<script type="text/javascript">
$(document).ready(function(){
    #('ep').hide();
    $('ep').click(function()){
        $().toggle();
    }
});
// Always provide paths that start with a slash character ("/").

</script>
        
@endsection
