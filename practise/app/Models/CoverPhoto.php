<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoverPhoto extends Model
{
    public function category(){
    	return $this->hasMany(Category::Class);
    }
}
