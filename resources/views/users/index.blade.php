@extends('layouts.app')

@section('content')
<navbar></navbar>

<div class="container">
    <users :users="{{ $users }}"></users>
</div>

@endsection