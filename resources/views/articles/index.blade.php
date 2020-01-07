@extends('layouts.app')

@section('content')
@php
//dd($articles)
@endphp

 <navbar></navbar>
 <div class="container">
    <articles :articles="{{ $articles }}"></articles>
</div>

@endsection