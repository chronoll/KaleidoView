<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'name',
        'category_image',
        'category_explanation',
    ];
    
    protected static function booted()
    {
        static::deleted(function($category){
            foreach ($category->posts as $post) {
                $post->delete();
            }
        });
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function relationships()
    {
        return $this->hasMany(Relationship::class);
    }
    
    public function followers() //CategoryをfollowするUserモデルのコレクションを返す
    {
        return $this->relationships()->with('user')->get()->pluck('user');
    }
    
    public static function searchByName($term)
    {
        return static::where('name', 'like', '%' . $term . '%')->get();
    }
    
    public function getPostsByCategory()
    {
        return $this->posts()->get()->sortByDesc('created_at');
        }
}
