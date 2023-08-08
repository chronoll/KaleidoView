<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Relationship;
use Illuminate\Support\Facades\Auth;

class RelationshipController extends Controller
{
    public function follow(Category $category)
    {
        if(Auth::user()!=$category->user){ //自分のCategoryでない場合
            Auth::user()->relationships()->create([
            'category_id'=>$category->id
            ]);
        }
        return back();
    }
    
    public function unfollow(Category $category)
    {
        $relationship=Auth::user()->relationships()->where('category_id',$category->id)->delete();
        
        return back();
    }
}
