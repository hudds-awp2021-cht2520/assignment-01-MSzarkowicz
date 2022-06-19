<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // protected $table = 'recipes';

    // protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function image(){
        return $this->hasOne(Image::class);
    }
}
