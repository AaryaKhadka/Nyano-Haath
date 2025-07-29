@extends('layouts.app')

@section('title', 'How It Works')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/categoriesDetail.css') }}">
@endsection

@section('content')


@include('layouts.donationstep')

@include('layouts.fundraisingstep')

@endsection