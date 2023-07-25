<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $posts=$category->getPostsByCategory();
        
        return view('posts.category',compact('category','posts'));
    }
}
