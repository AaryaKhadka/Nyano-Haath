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
              <!-- View -->
              <a href="{{ route('admin.campaigns.show', $campaign->id) }}" class="btn view-btn">View</a>

              <!-- Approve & Reject (if pending) -->
              @if($campaign->status === 'pending')
                <form action="{{ route('admin.campaigns.approve', $campaign->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn approve-btn">Approve</button>
                </form>

                <form action="{{ route('admin.campaigns.reject', $campaign->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn reject-btn" onclick="return confirm('Are you sure you want to reject this campaign?');">
                    Reject
                  </button>
                </form>
              @endif

              <!-- Feature button (if active) -->
              @if($campaign->status === 'active')
                <form action="{{ route('admin.campaigns.feature', $campaign->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn feature-btn">Feature</button>
                </form>
              @endif

              <!-- Unfeature button (if featured) -->
              @if($campaign->status === 'featured')
                <form action="{{ route('admin.campaigns.unfeature', $campaign->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn unfeature-btn">Unfeature</button>
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Reject Modal -->
  <!-- <div id="rejectModal" class="modal" style="display:none;">
    <div class="modal-content">
      <span class="close-btn" onclick="closeRejectModal()">&times;</span>
      <h2>Reject Campaign</h2>
      <form id="rejectForm" method="POST">
        @csrf
        <label for="reason">Reason for rejection:</label><br>
        <textarea name="reason" id="reason" rows="4" required></textarea>
        <input type="hidden" name="campaign_id" id="modalCampaignId">
        <button type="submit" class="btn reject-confirm-btn">Submit Rejection</button>
      </form>
    </div>
  </div>

  <script>
    function openRejectModal(campaignId) {
      const modal = document.getElementById('rejectModal');
      const form = document.getElementById('rejectForm');
      document.getElementById('modalCampaignId').value = campaignId;

      // Set action URL dynamically
      form.action = `/admin/campaigns/${campaignId}/reject`;

      modal.style.display = 'flex';
    }

    function closeRejectModal() {
      document.getElementById('rejectModal').style.display = 'none';
    }

    window.onclick = function(event) {
      const modal = document.getElementById('rejectModal');
      if (event.target === modal) {
        closeRejectModal();
      }
    }
  </script> -->
@endsection
