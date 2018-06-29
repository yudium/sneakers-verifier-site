<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'status_review', 'created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ ];

    public function verification_item_images()
    {
        return $this->hasMany('App\VerificationItemImage');
    }

    public function verification_item_link()
    {
        return $this->hasOne('App\VerificationItemLink');
    }

    public function getStatusReviewAttribute($value)
    {
        return ($value) ? 'Sudah Direview' : 'Belum Direview';
    }

    public function getTypeAttribute($value)
    {
        /* mapping:
         *      0 -> verification item versi gambar
         *      1 -> verification item versi link
         */
        return ($value) ? 'Gambar' : 'Link';
    }
}
