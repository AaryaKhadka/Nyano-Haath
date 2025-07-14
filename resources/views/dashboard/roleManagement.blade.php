@extends('layouts.adminLayout')

@section('title', 'Role Management - Nyano Haath')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
@endsection

@section('content')
  <div class="role-management">
    <h1>Role Management</h1>

    @if(session('success'))
      <div class="alert success">
        {{ session('success') }}
      </div>
    @endif

    <table class="role-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Current Role</th>
          <th>Change Role</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ ucfirst($user->role) }}</td>
          <td>
            <form action="{{ route('admin.roles.update', $user->id) }}" method="POST">
              @csrf
              @method('PUT')
              <select name="role">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="fundraiser" {{ $user->role === 'fundraiser' ? 'selected' : '' }}>Fundraiser</option>
                <option value="donor" {{ $user->role === 'donor' ? 'selected' : '' }}>Donor</option>
              </select>
              <button type="submit">Update</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
