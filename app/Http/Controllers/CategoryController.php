<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Auth;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


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
    
    public function store1(CategoryRequest $request,Category $category)
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
    
    public function store(CategoryRequest $request,Category $category)
    {
        $input=$request['category'];
        
        if($request->input('cropped_image')){
            // cropped_imageからBase64データを取得
            $base64_image = $request->input('cropped_image');

            // 不要な部分を削除してBase64データだけを取得
            list($type, $base64_image) = explode(';', $base64_image);
            list(, $base64_image) = explode(',', $base64_image);

            // Base64データをCloudinaryにアップロード
            $uploaded_image = Cloudinary::upload("data:" . $type . ";base64," . $base64_image);
            $image_url = $uploaded_image->getSecurePath();
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
        
        if($request->input('cropped_image')!=$category->category_image){
            // cropped_imageからBase64データを取得
            $base64_image = $request->input('cropped_image');

            // 不要な部分を削除してBase64データだけを取得
            list($type, $base64_image) = explode(';', $base64_image);
            list(, $base64_image) = explode(',', $base64_image);

            // Base64データをCloudinaryにアップロード
            $uploaded_image = Cloudinary::upload("data:" . $type . ";base64," . $base64_image);
            $image_url = $uploaded_image->getSecurePath();
            $input+=['category_image'=>$image_url];
        }
        $input+=['user_id'=>Auth::user()->id];
        $category->fill($input)->save();
        return redirect('/categories/' . $category->id);
    }
    
    public function delete(Category $category)
    {
        if(Auth::id()!=$category->user_id){ //認証中UserのもつCategoryでない場合
            return redirect('/');
        }

        $category->delete();
        return redirect(route('users.show',Auth::user()->name));
    }
}
