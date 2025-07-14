<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $users = User::all();
        return view('dashboard.roleManagement', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'role' => 'required|in:admin,fundraiser,donor',
        ]);

        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully!');
    }
}
