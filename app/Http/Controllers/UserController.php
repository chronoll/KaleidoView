<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Auth;
use Cloudinary;

class UserController extends Controller
{
    public function timeline(User $user)
    {
        $user=Auth::user();
        return view('posts.timeline')->with([
            'categories'=>$user->followingCategoriesWithUser()->get(),
            'posts'=>$user->followingCategoryPosts()->get(),
            ]);
    }
    
    public function show_user($name)
    {
        $user = User::findUserByName($name);
        
        if($user){
            $categories=$user->categories;
            $followers=[];
            $posts=[];
            foreach($categories as $category){
                $followers[$category->id]=$category->followers();
                $posts[$category->id]=$category->posts;
            }
            return view('profile.user',compact('user','categories','followers','posts'));
        }
        
        return redirect('/404');
    }
    
    public function edit($name)
    {
        $user = User::findUserByName($name);
        
        if(Auth::id()!=$user->id){
            return redirect('/');
        }

        return view('profile.edit_profile',['user'=>$user]);
    }

    public function update(UserRequest $request,$name)
    {
        $user=User::findUserByName($name);
        
        $input=$request['user'];
        
        if($request->input('cropped_image')==null){
            $input+=['user_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689043946/default.jpg'];
        }
        else if($request->input('cropped_image')!=$user->user_image){
            // cropped_imageからBase64データを取得
            $base64_image = $request->input('cropped_image');

            // 不要な部分を削除してBase64データだけを取得
            list($type, $base64_image) = explode(';', $base64_image);
            list(, $base64_image) = explode(',', $base64_image);

            // Base64データをCloudinaryにアップロード
            $uploaded_image = Cloudinary::upload("data:" . $type . ";base64," . $base64_image);
            $image_url = $uploaded_image->getSecurePath();
            $input+=['user_image'=>$image_url];
        }
        
        $input+=['id'=>Auth::user()->id];
        $user->fill($input)->save();
        return redirect('/users/' . $name);
    }

}
