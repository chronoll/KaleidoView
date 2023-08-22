<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchType = $request->input('type'); 
        $searchTerm = $request->input('term'); 
        
        switch ($searchType) {
            case 'post':
                $results =Post::searchByTitle($searchTerm);
                break;
            case 'category':
                $results = Category::searchByName($searchTerm);
                break;
            case 'user':
                $results = User::searchByName($searchTerm);
                break;
            default:
                $results = collect();
                break;
        }

        return view('search', [
            'results' => $results,
            'type' => $searchType,
            'term'=>$searchTerm
        ]);
    }

}
