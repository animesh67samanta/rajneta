<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'voter_user_id','society','society_mr','society_hi','house_no','house_no_mr','house_no_hi','flat_no','flat_no_mr','flat_no_hi','address','address_mr','address_hi','booth','booth_mr','booth_hi','village','village_mr','village_mr','village_hi','part_no','part_no_mr','part_no_hi','srn','srn_mr','srn_hi','voting_centre','voting_centre_mr','voting_centre_hi','taluka','taluka_mr','taluka_hi','assembly','assembly_mr','assembly_hi'
    ];
    public function voter()
    {
        return $this->belongsTo(Voters::class, 'voter_user_id', 'id');
    }
    public function voterInformation()
    {
        return $this->belongsTo(ExtraInformation::class, 'voter_user_id', 'voter_user_id');
    }
}
