<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'body',
        'post_image',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public static function searchByTitle($term)
    {
        return static::where('title', 'like', '%' . $term . '%')->with('user','category')->get();
    }
    
    protected static function booted()
    {
        static::deleted(function ($post){
            $post->comments()->delete();
        });
    }
}
