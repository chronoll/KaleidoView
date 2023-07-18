<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    /*public function show(Post $post)
    {
        return view('posts.show')->with(['post'=>$post]);
    }
    */
    public function like(Post $post)
    {
        $post->likes()->create(['user_id' => Auth::id()]);
        
        return back();
        
    }
    
    public function unlike(Post $post)
    {
        $post->likes()->where('user_id', Auth::id())->delete();
        
        return back();
        
    }
    
    public function show(Post $post)
    {
        $comments = $post->comments()->whereNull('parent_comment_id')->orderBy('created_at')->get();
        return view('posts.show', compact('post', 'comments'));
        
    }

}
