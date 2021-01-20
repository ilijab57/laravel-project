<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;
use App\User;

class Comment extends Model
{
    public function topic() {

        return $this->belongsTo(Topic::class);
        
    }

    public function user() {

        return $this->belongsTo(User::class);
        
    }
}
