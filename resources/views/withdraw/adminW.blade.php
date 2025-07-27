@extends('layouts.adminLayout')

@section('title', 'Withdrawal Requests - Nyano Haath')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/adminW.css') }}">
@endsection

@section('content')
  <div class="campaign-management">
    <h1>Withdrawal Requests</h1>

    @if(session('success'))
      <div class="alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
      <div class="alert error">{{ session('error') }}</div>
    @endif

    <table class="campaign-table">
      <thead>
        <tr>
          <th>Campaign</th>
          <th>Requested By</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Requested On</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($withdrawals as $withdrawal)
          <tr>
            <td>{{ $withdrawal->campaign->title ?? 'N/A' }}</td>
            <td>{{ $withdrawal->campaign->user->name ?? 'Unknown' }}</td>
            <td>Rs. {{ number_format($withdrawal->amount) }}</td>
            <td>{{ ucfirst($withdrawal->status) }}</td>
            <td>{{ $withdrawal->created_at->format('M d, Y') }}</td>
            <td>
              @if($withdrawal->status === 'pending')
                <form action="{{ route('admin.withdrawals.approve', $withdrawal->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn approve-btn">Approve</button>
                </form>

                <form action="{{ route('admin.withdrawals.reject', $withdrawal->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn reject-btn" onclick="return confirm('Reject this withdrawal request?');">Reject</button>
                </form>
              @elseif($withdrawal->status === 'approved')
                <span class="badge success">Approved</span>
              @elseif($withdrawal->status === 'rejected')
                <span class="badge error">Rejected</span>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
