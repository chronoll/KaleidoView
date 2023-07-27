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
            return redirect('/timeline');
        }

        return view('profile.edit_profile',['user'=>$user]);
    }

    public function update(UserRequest $request,$name)
    {
        $user=User::findUserByName($name);
        
        $input=$request['user'];
        
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input+=['user_image'=>$image_url];
        }
        
        $input+=['id'=>Auth::user()->id];
        $user->fill($input)->save();
        return redirect('/users/' . $name);
    }

}
