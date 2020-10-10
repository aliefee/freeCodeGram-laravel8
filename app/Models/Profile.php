<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profileImage()
    {
    	$imagePath = ($this->image) ? $this->image : 'profile/c9J66Yjl2McKVu7dW1UK5MhM8C8t8kp6UzbSkd8M.jpeg';
   
    	return '/storage/' . $imagePath;
	}

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
