<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::all();
        $posts = Post::paginate(5);
        $search = $request->input('search');
        if (!empty($search)) {
            $posts = Post::where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')->orWhere('author', 'like', '%' . $search . '%');
            })->paginate();
        }
        return view('posts.index', compact('posts', 'category'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:64',
            'category' => 'required|max:123',
            'description' => 'required|max:40',
            'status' => 'required',
            'author' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'multipleimages.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $slug = Str::slug($post->title);
        $post->slug = $slug;
        $post->category = $request->input('category');
        $categoryID = $request->input('category');
        $post->description = $request->input('description');
        $post->status = $request->input('status');
        $post->featured = $request->input('featured');
        $post->carousel = $request->input('carousel');
        $post->author = $request->input('author');
        $post->date = $request->input('date');
        // Handle image and banner file uploads
        if ($request->hasFile('image')) {
            $imagePath = $request['image']->store('images','public');
            $post->image = $imagePath;
        }
        if ($request->hasFile('banner')) {
            $bannerPath = $request['banner']->store('banners','public');
            $post->banner = $bannerPath;
        }
        $imagePaths = [];
        if ($request->hasFile('multipleimages')) {
            $request->validate([
                'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
            ]);
            foreach ($request->file('multipleimages') as $key => $value) {
                $imageName = time() . '_' . $key . '.' . $value->getClientOriginalExtension();
                $storedPath = $value->storeAs('multipleimages', $imageName, 'public');
                $imagePaths[] = $storedPath;
                // Save the $storedPath in the database here if necessary
            }}
        $post->multipleimages = json_encode($imagePaths);
        $post->introduction = $request->input('introduction');
        $post->body = $request->input('body');
        $post->conclusion = $request->input('conclusion');
        $post->save();
        $post->categories()->attach($categoryID);
        return redirect('/posts');
    }

    public function changeStatus($id, $status) {
        $posts = Post::find($id);
        $posts -> status = $status;
        $posts -> save();
        return response()->json(['success'=>'Status change successful']);
    }

    public function changeFeatured($id, $featured) {
        $posts = Post::find($id);
        $posts -> featured = $featured;
        $posts -> save();
        return response()->json(['success'=>'Featured change successful']);
    }

    public function changeCarousel($id, $carousel) {
        $posts = Post::find($id);
        $posts -> carousel = $carousel;
        $posts -> save();
        return response()->json(['success'=>'Carousel change successful']);
    }

    public function edit($id){
        $post = Post::find($id);
        $category = Category::all();
        $selectedCategories = $post->categories->pluck('id')->toArray();
        return view('posts.edit',compact('post','category','selectedCategories'));
    }

    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $slug = Str::slug($post->title);
        $post->slug = $slug;
        $categoryID = $request->input('category');
        $post->description = $request->input('description');
        $post->status = $request->input('status');
        $post->featured = $request->input('featured');
        $post->carousel = $request->input('carousel');
        $post->author = $request->input('author');
        $post->date = $request->input('date');
        // Handle image and banner file uploads
        if ($request->hasFile('image')) {
            // Delete the previous image
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }
        if ($request->hasFile('banner')) {
            // Delete the previous banner
            if ($post->banner) {
                Storage::disk('public')->delete($post->banner);
            }
            // Store the new banner
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $post->banner = $bannerPath;
        }
        //Handle multiple images
        $imagePaths = [];
        if ($request->hasFile('multipleimages')) {
            $request->validate([
                'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
            ]);
            // Delete previous images
            if ($post->multipleimages) {
                $previousImages = json_decode($post->multipleimages);
                foreach ($previousImages as $previousImage) {
                    Storage::disk('public')->delete($previousImage);
                }
            }
            foreach ($request->file('multipleimages') as $key => $value) {
                $imageName = time() . '_' . $key . '.' . $value->getClientOriginalExtension();
                $storedPath = $value->storeAs('multipleimages', $imageName, 'public');
                $imagePaths[] = $storedPath;
                // Save the $storedPath in the database here if necessary
            }}
        $post->multipleimages = json_encode($imagePaths);
        $post->introduction = $request->input('introduction');
        $post->body = $request->input('body');
        $post->conclusion = $request->input('conclusion');
        $post->save();
        $post->categories()->sync($categoryID);
        return redirect('/posts');
    }

    public function delete($id){
        $post = Post::find($id);
        // Delete the main image
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        // Delete the banner
        if ($post->banner) {
            Storage::disk('public')->delete($post->banner);
        }
        // Delete multiple images
        if ($post->multipleimages) {
            $multipleImages = json_decode($post->multipleimages);
            foreach ($multipleImages as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $this->deleteCommentsRecursively($post->comments);
        $post->delete();
        return redirect('/posts');
    }

    protected function deleteCommentsRecursively($comments)
    {
        foreach ($comments as $comment) {
            // Delete nested comments first
            $this->deleteCommentsRecursively($comment->replies);
            // Then delete the current comment
            $comment->delete();
        }
    }
}
