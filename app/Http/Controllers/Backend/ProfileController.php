<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    // Show the profile edit form
    public function edit()
    {
        return view('admin.profile.edit', [
            'user' => Auth::user(),
        ]);

    }//End Method

    public function viewUsers(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.profile.index');
    }

    // Update the user's profile
    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Flash success message
        flash()->addSuccess('Profile updated successfully!');

        return redirect()->route('admin.profile.edit');

    }//End Method

    // Delete the user profile
    // public function destroy(Request $request)
    // {
    //     $user = User::find(Auth::id());

    //     $user->delete();

    //     flash()->addSuccess('Profile deleted successfully!');

    //     return redirect()->route('login');
    // }
}
