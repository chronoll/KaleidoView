<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Auth;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $category=$post->category;
        return view('posts.show', compact('post', 'category','comments'));
        
    }
    
    public function create(Category $category)
    {
        if(Auth::id()!=$category->user_id){ //認証中UserのもつCategoryでない場合
            return redirect('/timeline');
        }
        
        return view('posts.create_post',['category'=>$category]);
    }
    
    public function store1(PostRequest $request,Post $post)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        
        $input=$request['post'];
        $input+=['user_id'=>Auth::user()->id];
        $input+=['post_image'=>$image_url];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function store(PostRequest $request, Post $post)
{
    // cropped_imageからBase64データを取得
    $base64_image = $request->input('cropped_image');

    // 不要な部分を削除してBase64データだけを取得
    list($type, $base64_image) = explode(';', $base64_image);
    list(, $base64_image) = explode(',', $base64_image);

    // Base64データをCloudinaryにアップロード
    $uploaded_image = Cloudinary::upload("data:" . $type . ";base64," . $base64_image);
    $image_url = $uploaded_image->getSecurePath();

    $input = $request['post'];
    $input += ['user_id' => Auth::user()->id];
    $input += ['post_image' => $image_url];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
}
    
    public function edit(Post $post)
    {
        if(Auth::id()!=$post->user_id){ //認証中UserのもつPostでない場合
            return redirect('/timeline');
        }
        
        return view('posts.edit_post',['post'=>$post,'category'=>$post->category]);
    }
    
    public function update(PostRequest $request,Post $post)
    {
        $input=$request['post'];
        $input+=['user_id'=>Auth::user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        
        if(Auth::id()!=$post->user_id){ //認証中UserのもつPostでない場合
            return redirect('/timeline');
        }
        
        $post->delete();
        return redirect('/');
    }
    
    public function test(Post $post)
    {
        return view('test');
    }

}
