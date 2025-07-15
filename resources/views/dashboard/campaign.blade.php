@extends('layouts.adminLayout')

@section('title', 'Campaign Management - Nyano Haath')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/campaign.css') }}">
@endsection

@section('content')
  <div class="campaign-management">
    <h1>Campaign Management</h1>

    @if(session('success'))
      <div class="alert success">{{ session('success') }}</div>
    @endif

    <table class="campaign-table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Fundraiser</th>
          <th>Goal Amount</th>
          <th>Raised Amount</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($campaigns as $campaign)
          <tr>
            <td>{{ $campaign->title }}</td>
            <td>{{ $campaign->user->name ?? 'N/A' }}</td>
            <td>Rs. {{ number_format($campaign->goal_amount) }}</td>
            <td>Rs. {{ number_format($campaign->raised_amount) }}</td>
            <td>{{ ucfirst($campaign->status) }}</td>
            <td>
              {{-- Always show View --}}
              <a href="{{ route('admin.campaigns.show', $campaign->id) }}" class="btn view-btn">View</a>

              {{-- Show Approve/Delete only for pending --}}
              @if($campaign->status === 'pending')
                <form action="{{ route('admin.campaigns.approve', $campaign->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn approve-btn">Approve</button>
                </form>

                <form action="{{ route('admin.campaigns.delete', $campaign->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn delete-btn">Delete</button>
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
