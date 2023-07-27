<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'user_image',
        'self_introduction',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    public function relationships()
    {
        return $this->hasMany(Relationship::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function followingCategories()
    {
        return $this->belongsToMany(Category::class,'relationships');
    }
    
    public function followingCategoryPosts()
    {
        return Post::whereHas('category',function($query){
            $query->whereIn('categories.id',$this->followingCategories()->pluck('categories.id'));
        });
    }
    
    public function followingCategoriesWithUser()
    {
        return $this->followingCategories()->with('user');
    }
    
    public function hasLiked(Post $post)
    {
        return $this->likes()->where('post_id', $post->id)->exists();
        
    }
    
    public static function searchByName($term)
    {
        return static::where('name', 'like', '%' . $term . '%')->get();
    }
    
    public static function findUserByName($name)
    {
        return static::where('name', $name)->first();
    }
}
