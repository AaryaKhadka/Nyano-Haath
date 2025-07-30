@extends('layouts.custom')

@section('content')
<style>
    .alert-success {
        max-width: 600px;
        margin: 100px auto;
        background-color: #e6ffed;
        border-left: 6px solid #28a745;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        color: #155724;
    }

    .alert-success h2 {
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: 600;
    }

    .alert-success a {
        text-decoration: none;
        color: white;
        background-color: #28a745;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .alert-success a:hover {
        background-color: #218838;
    }
</style>

<div class="alert alert-success">
    <h2>Thank you! Your donation to "{{ $campaign->title }}" was successful.</h2>
    <a href="{{ route('feed') }}">Back to campaigns</a>
</div>
@endsection
