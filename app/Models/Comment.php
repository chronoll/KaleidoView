<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'content',
        'parent_comment_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    //親コメントへの参照
    public function parent()
    {
        return $this->belongsTo(self::class,'parent_comment_id');
    }
    
    //子コメントへの参照
    public function children()
    {
        return $this->hasMany(self::class,'parent_comment_id');
    }
}
