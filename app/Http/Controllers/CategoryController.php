<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Cloudinary;
use Auth;


class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $posts=$category->getPostsByCategory();
        
        return view('posts.category',compact('category','posts'));
    }
    
    public function create(Category $category)
    {
        return view('create_category');
    }
    
    public function store(CategoryRequest $request,Category $category)
    {
        $input=$request['category'];
        
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input+=['category_image'=>$image_url];
        }
        
        $input+=['user_id'=>Auth::user()->id];
        $category->fill($input)->save();
        return redirect('/categories/' . $category->id);
    }
    
    public function edit(Category $category)
    {
        if(Auth::id()!=$category->user_id){ //認証中UserのもつPostでない場合
            return redirect('/timeline');
        }

        return view('edit_category',['category'=>$category]);
    }

    public function update(CategoryRequest $request,Category $category)
    {
        $input=$request['category'];
        
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input+=['category_image'=>$image_url];
        }
        
        $input+=['user_id'=>Auth::user()->id];
        $category->fill($input)->save();
        return redirect('/categories/' . $category->id);
    }
    
    public function delete(Category $category)
    {

        if(Auth::id()!=$category->user_id){ //認証中UserのもつPostでない場合
            return redirect('/timeline');
        }

        $category->delete();
        return redirect('/');
    }
}
