<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Comment extends Model
{
   public function replies(){
   	 return $this->hasMany(Comment::Class);
   }
   public function user(){
   	 return $this->belongsTo(User::Class);
   }
}
