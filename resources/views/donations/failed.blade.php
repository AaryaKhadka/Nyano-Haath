@extends('layouts.custom')

@section('content')
<style>
    .alert-danger {
        max-width: 600px;
        margin: 100px auto;
        background-color: #ffe6e6;
        border-left: 6px solid #dc3545;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        color: #721c24;
    }

    .alert-danger h2 {
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: 600;
    }

    .alert-danger a {
        text-decoration: none;
        color: white;
        background-color: #dc3545;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .alert-danger a:hover {
        background-color: #c82333;
    }
</style>

<div class="alert alert-danger">
    <h2>Payment failed or status: {{ $status }}</h2>
    <a href="{{ route('donation.form') }}">Try again</a>
</div>
@endsection
