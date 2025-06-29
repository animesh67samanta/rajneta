<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','user_type','society_master','caste_master','position_master','karyakarta_master','address_master', 'all_permission'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
