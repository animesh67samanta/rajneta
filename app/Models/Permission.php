<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'politician_id','user_id','user_type','bluetooth_access','excelsheet_download','call_access','pdf_download','image_download','survey_import_from_server','voter_slip','society_master','caste_master','profession_master','karyakarta_master','address_master'
    ];
}
