<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'first_name_mr',
        'first_name_hi',
        'middle_name',
        'middle_name_mr',
        'middle_name_hi',
        'surname',
        'surname_mr',
        'surname_hi',
        'email',
        'password',
        'image',
        'gender',
        'gender_mr',
        'gender_hi',
        'age',
        'dob',
        'cast',
        'cast_mr',
        'cast_hi',
        'position',
        'position_mr',
        'position_hi',
        'personnel',
        'voter_id',
        'dead',
        'voted',
        'star_voter',
        'colour_code',
        'mobile_1',
        'mobile_2',
        'family_member_id',
        'demands',
        'demands_mr',
        'demands_hi',


    ];

    public function voterAddress()
    {
        return $this->hasOne(UserAddress::class, 'voter_user_id', 'id');
    }
    public function voterInformation()
    {
        return $this->hasOne(ExtraInformation::class,'voter_user_id', 'id');
    }
    public function smsPermission()
    {
        return $this->hasOne(SmsPermission::class,'voter_user_id', 'id');
    }
}
