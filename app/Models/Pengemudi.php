<?php

namespace App\Models;

use App\Models\Mobil;
use Iluminate\Contrsct\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Iluminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengemudi extends Authenticatable
{
    use HasFactory;

    public function mobil()
    {
        return $this->hasMany(Mobil::class, 'id_pengemudi', 'id');
    }

    // protected $table = "pengemudis";
    // protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'password',
        'alamat',
        'status',
    ];
    public static function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ];
    }
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at', 'datetime',
    ];
}
