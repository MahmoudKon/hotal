<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'image',
        'room_id'
    ];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    } // to make formating to the created_at filed



    public function getImagePathAttribute($date)
    {
        return asset('uploads/images/rooms/' . $this->image);
    } // return the image path
}
