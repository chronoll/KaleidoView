<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
}
