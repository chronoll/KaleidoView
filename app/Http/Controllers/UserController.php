<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function timeline(User $user)
    {
        return view('posts.timeline')->with(['posts'=>$user->followingCategoryPosts()]);
    }
}
