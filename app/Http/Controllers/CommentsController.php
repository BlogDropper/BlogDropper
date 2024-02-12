<?php

namespace App\Http\Controllers;
use App\Models\Comments;
use App\Models\WebUsers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:1000', // Example validation rules for the body field
        ]);
        $comment = new Comments;
        $comment->user_id = $request['user_id'] = Auth::guard('webuser')->user()->id;
        $comment->post_id = $request['post_id'];
        $comment->body = $request['body'];
        $comment->save();
        return back();
    }

    public function nestedstore(Request $request){
        $request->validate([
            'body' => 'required|max:1000', // Example validation rules for the body field
        ]);
        $comment = new Comments;
        $comment->user_id = $request['user_id'] = Auth::guard('webuser')->user()->id;
        $comment->post_id = $request['post_id'];
        $comment->parent_id = $request['parent_id'];
        $comment->body = $request['body'];
        $comment->save();
        return back();
    }

    //For Backend

    public function index(Request $request){
        $comment = Comments::paginate(7);
        $search = $request->input('search');
        if (!empty($search)) {
            $comment = Comments::where(function ($query) use ($search) {
                $query->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                })->orWhereHas('posts', function ($postQuery) use ($search) {
                    $postQuery->where('title', 'like', '%' . $search . '%');
                })->orWhere('body', 'like', '%' . $search . '%');
            })->paginate();
        }
        return view('comments.index',compact('comment'));
    }

    public function edit($id){
        $post = Post::all();
        $webuser = WebUsers::all();
        $comments = Comments::all();
        $comment = Comments::find($id);
        return view('comments.edit',compact('comment','webuser','post','comments'),
        [ 'selectedUserId' => $comment->user_id, 'selectedPostId' => $comment->post_id ]);
    }

    public function update(Request $request, $id){
        $comment = Comments::find($id);
        $comment -> user_id = $request['user_id'];
        $comment -> post_id = $request['post_id'];
        $comment -> parent_id = $request['parent_id'];
        $comment -> body = $request['body'];
        $comment -> save();
        return redirect('/showcomments');
    }

    public function delete($id){
        $comment = Comments::find($id);
        $comment -> delete();
        return redirect('/showcomments');
    }
}
