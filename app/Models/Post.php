<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Comment;



class Post extends Model  // توجه: "Post" با حرف بزرگ
{
    use HasFactory;  // این خط حیاتی است


    protected $fillable = ['title','content','image','status','user_id'];

    protected $appends = ['image_url'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // دسترسی (accessor) برای URL کامل تصویر
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }
}
