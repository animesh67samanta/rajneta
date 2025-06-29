<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'voter_user_id','new_address', 
    ];

    public function voter()
    {
        return $this->belongsTo(Voters::class, 'voter_user_id', 'id');
    }
}
