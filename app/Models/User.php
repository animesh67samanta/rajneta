<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'politician_id',
        'first_name',
        'email',
        'password',
        'middle_name',
        'surname',
        'image',
        'gender',
        'age',
        'dob',
        'user_type',
        'otp',
        'is_otp_verified',
        'phone',
        'staff_type',
        'is_login',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userPermission()
    {
        return $this->hasOne(Permission::class, 'user_id', 'id');
    }

    public function masterPermission()
    {
        return $this->hasOne(MasterPermission::class, 'user_id', 'id');
    }
}
