<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebUsers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebuserController extends Controller
{
    //For Frontend

    public function login(){
        $cat = Category::where('status',1)->get();
        return view('frontend.login',compact('cat'));
    }

    public function signup(){
        $cat = Category::where('status',1)->get();
        return view('frontend.signup',compact('cat'));
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::guard('webuser')->attempt($request->only('email', 'password'))) {
            return redirect('index');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid email credentials', 'password' => 'Invalid password credentials']);
        }
    }

    public function new(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:web_users,email', // Add unique rule for email
            'password' => 'required'
        ]);
        // Check if the email is already in use
        $existingUser = WebUsers::where('email', $request->email)->exists();
        if ($existingUser) {
            return redirect()->back()->withErrors(['email' => 'The provided email is already in use.']);
        }
        $webuser = new WebUsers;
        $webuser -> name = $request['name'];
        $webuser -> email = $request['email'];
        $password = $request['password'];
        $webuser -> password = Hash::make($password);
        $webuser -> save();
        if (Auth::guard('webuser')->attempt($request->only('email', 'password'))) {
            return redirect('index');
        } else {
            return redirect()->back()->withErrors(['name' => 'Invalid credentials', 'email' => 'Invalid credentials', 'password' => 'Invalid credentials']);
        }
    }

    public function logout(){
        Auth::guard('webuser')->logout();
        return redirect('/index');
    }

    //For Backend

    public function index(Request $request){
        $webuser = Webusers::paginate(7);
        $search = $request->input('search');
        if (!empty($search)) {
            $webuser = Webusers::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')->orWhere('email','like','%' . $search . '%');
            })->paginate();
        }
        return view('webuser.index',compact('webuser'));
    }

    public function edit($id){
        $webuser = WebUsers::find($id);
        return view('webuser.edit',compact('webuser'));
    }

    public function update(Request $request, $id){
        $webuser = WebUsers::find($id);
        $webuser -> name = $request['name'];
        $webuser -> email = $request['email'];
        $password = $request['password'];
        $webuser -> password = Hash::make($password);
        $webuser -> save();
        return redirect('/webusershow');
    }

    public function delete($id){
        $webuser = Webusers::find($id);
        $webuser->delete();
        return redirect('/webusershow');
    }
}
