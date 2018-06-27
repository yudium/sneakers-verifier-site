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
        'user_id', 'status_review', 'created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ ];

    public function getStatusReviewAttribute($value)
    {
        return ($value) ? 'Sudah Direview' : 'Belum Direview';
    }
}
