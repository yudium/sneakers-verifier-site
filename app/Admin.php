<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo',
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const PHOTO_PROFILE_DIR = 'storage/admin_photo_profile';
    const PHOTO_DEFAULT     = 'storage/images/default_photo.svg';

    public function getPhotoPathAttribute()
    {
        if (!$this->photo) {
            return self::PHOTO_DEFAULT;
        }
        return self::PHOTO_PROFILE_DIR.'/'.$this->photo;
    }
}
