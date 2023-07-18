<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Iluminate\Notifications\Notifiable;
use Iluminate\Contrsct\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = "admins";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'password',
        'alamat',
    ];

    
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

        self::creating(function ($admin) {
            $admin->id = request()->id;
        });

        self::created(function ($admin) {
            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                Image::create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $admin->id,
                    'imageable_type' => "App\Models\Admin"
                ]);
            }
        });
        
        self::updating(function ($admin) {
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
            $admin->images()->create([
                'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                'src' => 'images/' . $uploaded['src']->basename,
                'alt' => Image::getAlt($image),
                'imageable_id' => $admin->id,
                'imageable_type' => "App\Models\Admin",
            ]);
        }
        });
        

        self::updated(function ($model) {
            // ... code here
        });

        self::deleting(function ($admin) {
            foreach ($admin->images as $key => $image) {
                $image->delete();
            }
        });

        self::deleted(function ($admin) {
        });
    }
}
