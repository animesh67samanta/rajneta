<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'voter_user_id','extra_info_1', 'extra_info_1_mr','extra_info_1_hi','extra_info_2', 'extra_info_2_mr','extra_info_2_hi','extra_info_3','extra_info_3_mr','extra_info_3_hi','extra_info_4','extra_info_4_mr','extra_info_4_hi','extra_info_5','extra_info_5_mr','extra_info_5_hi','extra_check_1','extra_check_2'
    ];
    public function voter()
    {
        return $this->belongsTo(Voters::class, 'voter_user_id', 'id');
    }

    public function voterAddress()
    {
        return $this->belongsTo(Voters::class, 'voter_user_id', 'voter_user_id');
    }

}

