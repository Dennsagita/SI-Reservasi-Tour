<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobil;

class Paket extends Model
{
    use HasFactory;
    public function mobil()
    {
        return $this->BelongsTo(Mobil::class, 'id_mobil');
    }
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_paket', 'id');
    }
    protected $fillable = [
        'id_mobil',
        'nama',
        'destinasi',
        'keterangan',
        'harga',
    ];

     //relation
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
     // boot
    public static function boot()
    {
        parent::boot();

        self::creating(function ($paket) {
            $paket->id = request()->id;
        });

        self::created(function ($paket) {
            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                Image::create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $paket->id,
                    'imageable_type' => "App\Models\Paket"
                ]);
            }
        });

        self::updating(function ($paket) {

            $img_array = explode(',', request()->deleted_images);
            array_pop($img_array);

            // dd($img_array);
            // dd(Image::whereIn('id', $img_array)->get());
            foreach ($img_array as $key => $image_id) {
                $will_deleted_image = Image::find($image_id);
                if (!is_null($will_deleted_image)) {
                    $will_deleted_image->delete();
                }
            }

            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                Image::create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $paket->id,
                    'imageable_type' => "App\Models\Paket"
                ]);
            }
        });

        self::updated(function ($model) {
            // ... code here
        });

        self::deleting(function ($paket) {
            foreach ($paket->images as $key => $image) {
                $image->delete();
            }
        });

        self::deleted(function ($paket) {
        });
    }
}
