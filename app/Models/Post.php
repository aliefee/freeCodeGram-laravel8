<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // to allow any post and store action
    protected $guarded = [];



    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
