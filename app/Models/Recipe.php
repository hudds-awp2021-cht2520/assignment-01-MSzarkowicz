<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function ownedBy(User $user){

        return $user->id === $this->user_id;
    }

    
    public function notOwnedBy(User $user){

        return $user->id !== $this->user_id;
    }
}
