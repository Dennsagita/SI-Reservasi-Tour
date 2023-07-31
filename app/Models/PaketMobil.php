<?php

namespace App\Models;

use App\Models\Mobil;
use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketMobil extends Model
{
    use HasFactory;
    protected $table = 'paket_mobil';
    protected $fillable = [
        'id_paket',
        'id_mobil',
        'konfirmasi',
    ];

    public function paket1()
    {
        return $this->belongsTo(Paket::class);
    }

    public function mobil1()
    {
        return $this->belongsTo(Mobil::class);
    }
}
