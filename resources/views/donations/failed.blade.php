@extends('layouts.custom')

@section('content')
<div class="alert alert-danger">
    <h2>Payment failed or status: {{ $status }}</h2>
    <a href="{{ route('donation.form') }}">Try again</a>
</div>
@endsection
