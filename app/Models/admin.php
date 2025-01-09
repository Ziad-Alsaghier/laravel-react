<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
        protected $fillable = [
        'name',
        'identity_type',
        'identity_number',
        'email',
        'phone',
        'image',
        'identity_image',
        'password',
        'user_position_id',
        'status',
        'email_verified_at',
        ];
   protected function casts(): array
   {
   return [
   'email_verified_at' => 'datetime',
   'password' => 'hashed',
   ];
   }
}
