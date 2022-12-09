<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;

    protected  $table = 'app_users';
}
