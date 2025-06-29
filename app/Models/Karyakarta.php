<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyakarta extends Model
{
    use HasFactory;
    protected $table = 'karyakarts';
    protected $fillable = [
        'user_id',
        'karyakarta',
        'karyakarta_mr',
        'karyakarta_hi',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
