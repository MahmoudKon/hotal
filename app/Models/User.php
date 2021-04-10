<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'personal_id',
        'banned',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*
    *****************************************************************************
    *************************** Begin ATTRIBUTES Area ****************************
    *****************************************************************************
    */
    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    } // Auto Hash Password

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForhumans();
    } // to make formating to the created_at filed
}
