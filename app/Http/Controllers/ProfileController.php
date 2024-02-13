<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Support\Facades\Artisan;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $users = User::all();
        return view('profile.edit',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6', // Assuming you want to allow null passwords or require at least 8 characters
        ]);
        $user = User::find($id);
        $user -> name = $request['name'];
        $user -> email = $request['email'];
        $password = $request['password'];
        $user -> password = Hash::make($password);
        $user -> save();
        return redirect()->back();
    }

    public function settings(){
        return view('pages.settings');
    }

    public function toggle(){
        if (app()->isDownForMaintenance()) {
            Artisan::call('up'); // Turn off maintenance mode
        } else {
            Artisan::call('down', [
                '--render' => 'maintainence',
            ]); // Turn on maintenance mode
        }
        return response()->json(['message' => 'Maintenance mode toggled.']);
    }
}
