@extends('layouts.custom')

@section('content')
<div class="alert alert-success">
    <h2>Thank you! Your donation to "{{ $campaign->title }}" was successful.</h2>
    <a href="{{ route('feed') }}">Back to campaigns</a>
</div>
@endsection
