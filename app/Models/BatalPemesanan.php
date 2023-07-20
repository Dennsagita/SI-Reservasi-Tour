<?php

namespace App\Models;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatalPemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan_batal';
    protected $primaryKey = "id";
    protected $fillable = [
        'id_pemesanan',
        'keterangan',
    ];
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

}
