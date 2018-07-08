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

    /**
     * correspond to `type` column in table
     */
    const TYPE_IMAGES_BASED = 0;
    const TYPE_LINK_BASED   = 1;

    /**
     * correspond to `status_review` column in table
     */
    const STATUS_REVIEWED   = 0;
    const STATUS_UNREVIEWED = 1;

    public function verification_item_images()
    {
        return $this->hasMany('App\VerificationItemImage');
    }

    public function verification_item_link()
    {
        return $this->hasOne('App\VerificationItemLink');
    }

    public function review()
    {
        return $this->hasOne('App\Review');
    }

    public function getStatusReviewAttribute($value)
    {
        return ($value == self::STATUS_REVIEWED) ? 'Sudah Direview' : 'Belum Direview';
    }

    public function getTypeAttribute($value)
    {
        return ($value == self::TYPE_IMAGES_BASED) ? 'Gambar' : 'Link';
    }
}
