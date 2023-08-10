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

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    protected $fillable = [
        'id_pemesanan',
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
   
           self::creating(function ($batalpemesanan) {
               $batalpemesanan->id = request()->id;
           });
   
           self::created(function ($batalpemesanan) {
               foreach (request()->file('images') ?? [] as $key => $image) {
                   $uploaded = Image::uploadImage($image);
                   Image::create([
                       'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                       'src' => 'images/' . $uploaded['src']->basename,
                       'alt' => Image::getAlt($image),
                       'imageable_id' => $batalpemesanan->id,
                       'imageable_type' => "App\Models\BatalPemesanan"
                   ]);
               }
           });
   
           self::updating(function ($batalpemesanan) {
   
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
                       'imageable_id' => $batalpemesanan->id,
                       'imageable_type' => "App\Models\BatalPemesanan"
                   ]);
               }
           });
   
           self::updated(function ($model) {
               // ... code here
           });
   
           self::deleting(function ($batalpemesanan) {
               foreach ($batalpemesanan->images as $key => $image) {
                   $image->delete();
               }
           });
   
           self::deleted(function ($batalpemesanan) {
           });
       }

}
