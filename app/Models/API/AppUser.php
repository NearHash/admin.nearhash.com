<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AppUser extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected  $table = 'app_users';

   public function images()
   {
       return $this->hasMany(Profile::class, 'app_user_id');
   }
}
