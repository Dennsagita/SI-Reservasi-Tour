<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengemudi;


class Mobil extends Model
{
    use HasFactory;

    public function pengemudi()
    {
        return $this->BelongsTo(Pengemudi::class, 'id_pengemudi');
    }
    
    protected $fillable = [
        'id_pengemudi',
        'no_plat_mobil',
        'merk',
        'nama_mobil',
        'keterangan',
    ];

    
}
