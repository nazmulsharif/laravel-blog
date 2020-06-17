<?php

namespace App\Models;
use App\Models\PostImage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function images(){
    	return $this->hasMany(PostImage::class);
    }
    public function comments(){
    	return $this->hasmany(Comment::class);
    }
}
