<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $appends = ['image_url'];

    public function profile () {
        return $this->belongsTo(Profile::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('/users/'.$this->image);
    }
}
