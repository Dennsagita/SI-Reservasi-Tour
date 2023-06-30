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

     //relation
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
     // boot
    public static function boot()
    {
        parent::boot();

        self::creating(function ($mobil) {
            $mobil->id = request()->id;
        });

        self::created(function ($mobil) {
            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                Image::create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $mobil->id,
                    'imageable_type' => "App\Models\mobil"
                ]);
            }
        });

        self::updating(function ($mobil) {

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
                    'imageable_id' => $mobil->id,
                    'imageable_type' => "App\Models\mobil"
                ]);
            }
        });

        self::updated(function ($model) {
            // ... code here
        });

        self::deleting(function ($mobil) {
            foreach ($mobil->images as $key => $image) {
                $image->delete();
            }
        });

        self::deleted(function ($mobil) {
        });
    }
    
}
