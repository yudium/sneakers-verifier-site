<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'verification_item_id', 'note', 'status', 'created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ ];

    /**
     * correspond to `status` column in table
     */
    const STATUS_ORIGINAL       = 'o'; // original
    const STATUS_NOT_ORIGINAL   = 'n'; // not original
    const STATUS_REJECTED       = 'r'; // rejected

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case self::STATUS_ORIGINAL:
                return 'Asli';
            case self::STATUS_NOT_ORIGINAL:
                return 'Tidak Asli';
            case self::STATUS_REJECTED:
                return 'Review Ditolak';
        }
    }
}
