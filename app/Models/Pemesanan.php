<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use App\Models\PemesananBatalPengemudi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = "pemesanans";
    protected $primaryKey = "id";

    public function paket()
    {
        return $this->BelongsTo(Paket::class, 'id_paket');
    }
    public function user()
    {
        return $this->BelongsTo(User::class, 'id_user');
    }
    public function mobil()
    {
        return $this->BelongsTo(Mobil::class, 'id_mobil');
    }
    public function batalPesanan()
    {
        return $this->hasOne(BatalPesanan::class, 'id_pemesanan');
    }

    public function pesananBatalPengemudi()
    {
        return $this->hasOne(PemesananBatalPengemudi::class, 'id_pemesanan');
    }

    // public function mobil()
    // {
    //     return $this->hasOneThrough(Mobil::class, Paket::class, 'id_mobil', 'id_paket');
    // }
    protected $fillable = [
        'id_user',
        'id_paket',
        "id_mobil",
        'tgl_tour_mulai',
        'tgl_tour_selesai',
        'tgl_berangkat',
        'jam_datang',
        'lokasi_penjemputan',
        'nominal_dp',
        'status_pemesanan',
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
  
          self::creating(function ($pemesanan) {
              $pemesanan->id = request()->id;
          });
  
          self::created(function ($pemesanan) {
              foreach (request()->file('images') ?? [] as $key => $image) {
                  $uploaded = Image::uploadImage($image);
                  Image::create([
                      'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                      'src' => 'images/' . $uploaded['src']->basename,
                      'alt' => Image::getAlt($image),
                      'imageable_id' => $pemesanan->id,
                      'imageable_type' => "App\Models\Pemesanan"
                  ]);
              }
          });
  
          self::updating(function ($pemesanan) {
  
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
                      'imageable_id' => $pemesanan->id,
                      'imageable_type' => "App\Models\Pemesanan"
                  ]);
              }
          });
  
          self::updated(function ($model) {
              // ... code here
          });
  
          self::deleting(function ($pemesanan) {
              foreach ($pemesanan->images as $key => $image) {
                  $image->delete();
              }
          });
  
          self::deleted(function ($pemesanan) {
          });
      }
}
