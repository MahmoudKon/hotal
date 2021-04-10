<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Employee extends Authenticatable
{
    use LaratrustUserTrait, HasFactory, Notifiable;

    protected $fillable = [
        'image',
        'username',
        'email',
        'password',
        'phone',
        'address',
        'birthday',
        'personal_id',
        'emp_id',
        'banned',
        'role',
        'created_by'
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'updated_at',
    ];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */


    /*
    *****************************************************************************
    *************************** Begin SCOPE Area ****************************
    *****************************************************************************
    */
    public function scopeWithOutAuth($query)
    {
        return $query->where('id', '<>', auth()->user()->id);
    } // Return all Employees With Out The Employee Make Auth

    public function scopewithOutSuperAdmin($query)
    {
        return $query->withOutAuth()->where('role', '<>', 'super_admin');
    } // Return all Employees With Out The Role Super Admin


    /*
    *****************************************************************************
    *************************** Begin ATTRIBUTES Area ****************************
    *****************************************************************************
    */
    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    } // Auto Hash Password

    public function getImagePathAttribute($date)
    {
        return asset('uploads/images/employees/' . $this->image);
    } // return the image path

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForhumans();
    } // to make formating to the created_at filed
}
