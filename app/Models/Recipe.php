<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function ownedBy(User $user){

        return $user->id === $this->user_id;
    }

    
    public function notOwnedBy(User $user){

        return $user->id !== $this->user_id;
    }
    // public function path ($append = "") {

    //     return "/index/" . $this -> id . "/" . $append;
    // }

    // public function getPathAttribute () {

    //     return $this -> path ();

    // }
}
