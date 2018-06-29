<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationItemLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'verification_item_id', 'link'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ ];

    public $timestamps = false;
}
