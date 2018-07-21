<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Verificator extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'biography',
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const PHOTO_PROFILE_DIR = 'storage/verificator_photo_profile';
    const PHOTO_DEFAULT     = 'storage/images/default_photo.svg';

    public function reviews()
    {
        return $this->hasMany('App\Review', 'reviewer_id')
                        ->orderBy('created_at', 'asc');
    }
}
