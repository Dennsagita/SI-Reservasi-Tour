<?php

namespace App\Models;

use App\Models\Mobil;
// use Illuminate\Auth\Passwords\CanResetPassword;
// use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Notifications\Notifiable;
// use Iluminate\Contrsct\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Image;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengemudi extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

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

    //relation
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
     // boot
    public static function boot()
    {
        parent::boot();

        self::creating(function ($pengemudi) {
            $pengemudi->id = request()->id;
        });

        self::created(function ($pengemudi) {
            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                Image::create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $pengemudi->id,
                    'imageable_type' => "App\Models\pengemudi"
                ]);
            }
        });
        
        self::updating(function ($pengemudi) {
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
            $pengemudi->images()->create([
                'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                'src' => 'images/' . $uploaded['src']->basename,
                'alt' => Image::getAlt($image),
                'imageable_id' => $pengemudi->id,
                'imageable_type' => "App\Models\Pengemudi",
            ]);
        }
        });
        

        self::updated(function ($model) {
            // ... code here
        });

        self::deleting(function ($pengemudi) {
            foreach ($pengemudi->images as $key => $image) {
                $image->delete();
            }
        });

        self::deleted(function ($pengemudi) {
        });
    }
}
