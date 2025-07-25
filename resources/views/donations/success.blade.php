@extends('layouts.custom')

@section('content')
<div class="alert alert-success">
    <h2>{{ $message }}</h2>
    <a href="{{ route('feed') }}">Back to campaigns</a>
</div>
@endsection
