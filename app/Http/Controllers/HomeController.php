<?php

namespace App\Http\Controllers;
use App\Models\Comments;
use App\Models\Post;
use App\Models\WebUsers;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comments = Comments::all();
        $posts = Post::all();
        $cat = Category::where('status', 1)->get();
        $webuser = WebUsers::all();
        return view('dashboard', compact('comments','posts','webuser','cat'));
    }
}
