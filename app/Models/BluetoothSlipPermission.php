<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BluetoothSlipPermission extends Model
{
    use HasFactory;

    protected $table = 'bluetooth_slip_permissions';

    protected $fillable = [
        'description', 'booth', 'address','house_no'
    ];
}
