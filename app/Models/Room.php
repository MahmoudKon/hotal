<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'number',
        'is_available',
        'info',
        'people_count',
        'price',
        'floor_id',
    ];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id', 'id');
    } // to make formating to the created_at filed

    public function images()
    {
        return $this->hasMany(RoomImage::class, 'room_id', 'id');
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

    public function getImagePathAttribute($date)
    {
        return asset('uploads/images/rooms/' . $this->image);
    } // return the image path
}
