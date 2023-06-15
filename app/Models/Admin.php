<?php

namespace App\Models;

use Iluminate\Contrsct\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Iluminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = "admins";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'password',
        'alamat',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
