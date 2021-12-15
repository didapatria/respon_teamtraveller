<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangeController extends Controller
{
    public function index()
    {
        return view('dashboard.change.index', [
            'title' => 'Change Password'
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'last_password' => 'required',
            'new_password' => 'required'
        ]);

        if (Hash::check($request->last_password, auth()->user()->password)) {
            $user->where('id', auth()->user()->id)
                ->update(['password' => Hash::make($request->new_password)]);

            return redirect('/dashboard/change')->with('success', 'Password has been updated!');
        }
    }
}
