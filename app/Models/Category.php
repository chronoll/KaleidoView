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
            $category->relationships()->delete();
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
    
    public function tags()
    {
        return $this->hasMany(Tag::class)->orderBy('position','asc');
    }
    
    public static function searchByName($term)
    {
        return static::where('name', 'like', '%' . $term . '%')->with('posts')->get();
    }
    
    public function getPostsByCategory()
    {
        return $this->posts()->get()->sortByDesc('created_at');
    }
    
    public function selectPostsByTag(Tag $tag)
    {
        return $this->posts()->where('tag_id',$tag->id)->get()->sortByDesc('created_at');
    }
    
    public function getTagsByCategory(){
        return $this->tags()->get()->sortByDesc('position');
    }
    
    public function getFollowerCountAttribute()
    {
        return $this->followers()->count();
    }
    
    public function getTotalLikesAttribute() //各投稿の総Like数を返す
    {
        return $this->posts->sum(function($post){
            return $post->likes->count();
        });
    }
}
