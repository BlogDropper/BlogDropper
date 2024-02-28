<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index() {
        $gallery = Post::where('carousel',1)->orderByDesc('created_at')->get();
        $posts = Post::where('status',1)->orderByDesc('updated_at')->get(); //according to date
        $featured_posts = Post::where('featured',1)->get();
        $cat = Category::where('status',1)->get();
        return view('frontend.index',compact('posts','cat','featured_posts','gallery'));
    }

    public function search(Request $request){
        $cat = Category::where('status',1)->get();
        if($request->input('search') == null){
            return redirect()->back();
        }
        else{
        $postsQuery = Post::query();
        // For Search
        $search = $request->input('search');
        if ($search) {
            $postsQuery->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('author', 'like', '%' . $search . '%');
            });
        }
        $posts = $postsQuery->orderByDesc('updated_at')->get();
        }
        return view('frontend.searchresults',compact('cat','posts'));
    }

    public function about(){
        $cat = Category::where('status',1)->get();
        return view('frontend.about',compact('cat'));
    }

    public function post($id){
        $post = Post::find($id);
        $cat = Category::where('status',1)->get();
        return view('frontend.post',compact('post','cat'));
    }

    public function showcat(Request $request, $category){
        $cat = Category::where('status', 1)->get();
        $category = Category::where('name', $category)->first();
        // Fetch posts based on the selected category or all posts if no category selected
        $postsQuery = $category ? $category->posts() : Post::query();
        // For Search
        $search = $request->input('search');
        if ($search) {
            $postsQuery->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('author', 'like', '%' . $search . '%');
            });
        }
        $posts = $postsQuery->orderByDesc('updated_at')->paginate(9);
        return view('frontend.posts_with_cat', compact('posts', 'category', 'cat', 'search'));
    }

    public function showmoreposts() {
        //we use ajax call to show a list of posts excluding the first three posts
        $firstThreePostIds = Post::where('featured', 1)->take(3)->pluck('id')->toArray();
        // Fetch the featured posts excluding the first 3 posts
        $moreposts = Post::where('featured', 1)->whereNotIn('id', $firstThreePostIds)->get();
        return view('frontend.moreposts', compact('moreposts'));
    }

    public function showmorepops() {
        //we use ajax call to show a list of posts excluding the first three posts
        $firstThreePostIds = Post::where('status', 1)->orderByDesc('updated_at')->take(2)->pluck('id')->toArray();
        // Fetch the featured posts excluding the first 3 posts
        $moreposts = Post::where('status', 1)->whereNotIn('id', $firstThreePostIds)->get();
        return view('frontend.morepops', compact('moreposts'));
    }

    public function showpostslug($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        $cat = Category::where('status',1)->get();
        return view('frontend.post', compact('post','cat'));
    }

}
