<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'number',
        'is_available',
    ];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function rooms()
    {
        return $this->hasMany(Room::class, 'floor_id', 'id');
    } // to make formating to the created_at filed

    /*
    *****************************************************************************
    *************************** Begin ATTRIBUTES Area ****************************
    *****************************************************************************
    */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForhumans();
    } // to make formating to the created_at filed
}
