<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CommentRequest;
use Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'parent_comment_id' => $request->parent_comment_id,
        ]);
        
        return back();
        
    }
    public function delete(Comment $comment)
    {

        if(Auth::id()!=$comment->user_id){ //認証中UserのもつCommentでない場合
            return redirect('/');
        }

        $comment->delete();
        return back();
    }
}
