<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'password',
        'alamat',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_user', 'id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
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
  
          self::creating(function ($user) {
              $user->id = request()->id;
          });
  
          self::created(function ($user) {
              foreach (request()->file('images') ?? [] as $key => $image) {
                  $uploaded = Image::uploadImage($image);
                  Image::create([
                      'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                      'src' => 'images/' . $uploaded['src']->basename,
                      'alt' => Image::getAlt($image),
                      'imageable_id' => $user->id,
                      'imageable_type' => "App\Models\User"
                  ]);
              }
          });
          
          self::updating(function ($user) {
            $img_array = explode(',', request()->deleted_images);
            array_pop($img_array);

            foreach ($img_array as $key => $image_id) {
                $will_deleted_image = Image::find($image_id);
                if (!is_null($will_deleted_image)) {
                    $will_deleted_image->delete();
                }
            }

            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                $user->images()->create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $user->id,
                    'imageable_type' => "App\Models\User",
                ]);
            }
            });
          
  
          self::updated(function ($model) {
              // ... code here
          });
  
          self::deleting(function ($user) {
              foreach ($user->images as $key => $image) {
                  $image->delete();
              }
        });
  
        self::deleted(function ($user) {
        });
    }
}
