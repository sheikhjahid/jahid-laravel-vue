@extends('layouts.app')

@section('content')

 <navbar></navbar>
 <div class="container">
    <articles :articles="{{ $articles }}"></articles>
</div>

@endsection