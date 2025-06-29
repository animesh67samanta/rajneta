<?php

namespace App\Imports;

use App\Models\ExtraInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\Voters;
use App\Models\UserAddress;
use Maatwebsite\Excel\Concerns\ToModel;

class VotersImport implements ToModel
{
    private $skipFirstRow = true;

    private function parseDate($value)
    {
        try {
            if (empty($value)) {
                throw new \Exception('Date value is empty.');
            }

            if (is_numeric($value)) {
                return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format('Y-m-d');
            }

            $formats = ['d-m-Y', 'Y-m-d', 'm/d/Y'];
            foreach ($formats as $format) {
                $parsedDate = \Carbon\Carbon::createFromFormat($format, $value);
                if ($parsedDate !== false) {
                    return $parsedDate->format('Y-m-d');
                }
            }

            throw new \Exception('Unable to parse date format.');
        } catch (\Exception $e) {
            Log::error("Date parsing failed for value: {$value} - Error: " . $e->getMessage());
            return null;
        }
    }

    public function model(array $row)
    {
        if ($this->skipFirstRow) {
            $this->skipFirstRow = false;
            return null;
        }

        if (empty($row[0]) || empty($row[3]) || empty($row[6])) {
            Log::warning('Skipping row due to missing essential fields: ' . json_encode($row));
            return null;
        }

        $firstname = $row[0] ?: 'Unknown';
        $middlename = $row[3] ?: 'Unknown';
        $surname = $row[6] ?: 'Unknown';
        $email = $row[9] ?: 'Unknown';
        $password = $row[10] ?: null;
        $image = $row[11] ?: 'No image';
        $dob = $this->parseDate($row[16]) ?: '1900-01-01';
        $gender = $row[12] ?: 'Unknown';
        $age = $row[15] ?: 'Unknown';
        $voterId = $row[24] ?: 'Unknown';
        $cast = $row[17] ?: 'Unknown';
        $position = $row[20] ?: 'Unknown';
        $demands = $row[33] ?: 'Unknown';
        $society = $row[37]?: 'Unknown';
        $house_no = $row[40] ?: 'Unknown';
        $flat_no = $row[43] ?: 'Unknown';
        $address = $row[46] ?: 'Unknown';
        $booth = $row[49] ?: 'Unknown';
        $village = $row[52] ?: 'Unknown';
        $part_no = $row[55] ?: 'Unknown';
        $srn = $row[58] ?: 'Unknown';
        $voting_centre = $row[61] ?: 'Unknown';
        $taluka = $row[64] ?: 'Unknown';
        $extra_info_one = $row[67] ?: 'Unknown';
        $extra_info_two = $row[70] ?: 'Unknown';
        $extra_info_three = $row[73] ?: 'Unknown';
        $extra_info_four = $row[76] ?: 'Unknown';
        $extra_info_five = $row[79] ?: 'Unknown';

        try {
            $voter = Voters::create([
                'first_name' => $firstname,
                'first_name_mr' => $row[1] ?: GoogleTranslate::trans($firstname, 'mr'),
                'first_name_hi' => $row[2] ?: GoogleTranslate::trans($firstname, 'hi'),
                'middle_name' => $middlename,
                'middle_name_mr' => $row[4] ?: GoogleTranslate::trans($middlename, 'mr'),
                'middle_name_hi' => $row[5] ?: GoogleTranslate::trans($middlename, 'hi'),
                'surname' => $surname,
                'surname_mr' => $row[7] ?: GoogleTranslate::trans($surname, 'mr'),
                'surname_hi' => $row[8] ?: GoogleTranslate::trans($surname, 'hi'),
                'email' =>  $email,
                'password' => $password,
                'dob' => $dob,
                'gender' => $gender,
                'gender_mr' => $row[13] ?: GoogleTranslate::trans($gender, 'mr'),
                'gender_hi' => $row[14] ?: GoogleTranslate::trans($gender, 'hi'),
                'age' =>$age,
                'cast' => $cast,
                'cast_mr' => $row[18] ?: GoogleTranslate::trans($cast, 'mr'),
                'cast_hi' => $row[19] ?: GoogleTranslate::trans($cast, 'hi'),
                'position' => $position,
                'position_mr' => $row[21] ?: GoogleTranslate::trans($position, 'mr'),
                'position_hi' => $row[22] ?: GoogleTranslate::trans($position, 'hi'),
                'personnel' => $row[23],
                'voter_id' => $voterId,
                'dead' => $row[25] ?: 0,
                'voted' => $row[26] ?:0,
                'star_voter' => $row[27] ?:0,
                'repeated_voter' => $row[28] ?:0,
                'colour_code' => $row[29] ?:'Unknown',
                'mobile_1' => $row[30] ?:'Unknown',
                'mobile_2' => $row[31] ?:'Unknown',
                'family_member_id' => $row[32] ?: NULL,
                'demands' => $demands,
                'demands_mr' => $row[34] ?: GoogleTranslate::trans($demands, 'mr'),
                'demands_hi' => $row[35] ?: GoogleTranslate::trans($demands, 'hi'),
                'image' => $image,
            ]);

            UserAddress::create([
                'voter_user_id' => $voter->id,
                'society' => $society,
                'society_mr' => $row[38] ?: GoogleTranslate::trans($society, 'mr'),
                'society_hi' => $row[39] ?: GoogleTranslate::trans($society, 'hi'),
                'house_no' => $house_no,
                'house_no_mr' => $row[41] ?: GoogleTranslate::trans($house_no, 'mr'),
                'house_no_hi' => $row[42] ?: GoogleTranslate::trans($house_no, 'hi'),
                'flat_no' => $flat_no,
                'flat_no_mr' => $row[44] ?: GoogleTranslate::trans($flat_no, 'mr'),
                'flat_no_hi' => $row[45] ?: GoogleTranslate::trans($flat_no, 'hi'),
                'address' => $address,
                'address_mr' => $row[47] ?: GoogleTranslate::trans($address, 'mr'),
                'address_hi' => $row[48] ?: GoogleTranslate::trans($address, 'hi'),
                'booth' => $booth,
                'booth_mr' => $row[50] ?: GoogleTranslate::trans($booth, 'mr'),
                'booth_hi' => $row[51] ?: GoogleTranslate::trans($booth, 'hi'),
                'village' =>  $village,
                'village_mr' => $row[53] ?: GoogleTranslate::trans($village, 'mr'),
                'village_hi' => $row[54] ?: GoogleTranslate::trans($village, 'hi'),
                'part_no' => $part_no,
                'part_no_mr' => $row[56] ?: GoogleTranslate::trans($part_no, 'mr'),
                'part_no_hi' => $row[57] ?: GoogleTranslate::trans($part_no, 'hi'),
                'srn' => $srn,
                'srn_mr' => $row[59] ?: GoogleTranslate::trans($srn, 'mr'),
                'srn_hi' => $row[60] ?: GoogleTranslate::trans($srn, 'hi'),
                'voting_centre' => $voting_centre,
                'voting_centre_mr' => $row[62] ?: GoogleTranslate::trans($voting_centre, 'mr'),
                'voting_centre_hi' => $row[63] ?: GoogleTranslate::trans($voting_centre, 'hi'),
                'taluka' => $taluka,
                'taluka_mr' => $row[65] ?: GoogleTranslate::trans($taluka, 'mr'),
                'taluka_hi' => $row[66] ?: GoogleTranslate::trans($taluka, 'hi'),


            ]);
            ExtraInformation::create([
                'voter_user_id' => $voter->id,
                'extra_info_1' => $extra_info_one,
                'extra_info_1_mr' =>$row[68] ?: GoogleTranslate::trans($extra_info_one, 'mr'),
                'extra_info_1_hi' => $row[69] ?: GoogleTranslate::trans($extra_info_one, 'hi'),
                'extra_info_2' => $extra_info_two,
                'extra_info_2_mr' => $row[71] ?: GoogleTranslate::trans($extra_info_two, 'mr'),
                'extra_info_2_hi' => $row[72] ?: GoogleTranslate::trans($extra_info_two, 'hi'),
                'extra_info_3' => $extra_info_three,
                'extra_info_3_mr' =>  $row[74] ?: GoogleTranslate::trans($extra_info_three, 'mr'),
                'extra_info_3_hi' =>  $row[75] ?: GoogleTranslate::trans($extra_info_three, 'hi'),
                'extra_info_4' => $extra_info_four,
                'extra_info_4_mr' =>  $row[77] ?: GoogleTranslate::trans( $extra_info_four, 'mr'),
                'extra_info_4_hi' =>  $row[78] ?: GoogleTranslate::trans($extra_info_four, 'hi'),
                'extra_info_5' => $extra_info_five,
                'extra_info_5_mr' => $row[80] ?: GoogleTranslate::trans( $extra_info_five, 'mr'),
                'extra_info_5_hi' =>$row[81] ?: GoogleTranslate::trans( $extra_info_five, 'hi'),
                'extra_check_1' => $row[82] ?: 0,
                'extra_check_2' => $row[83] ?: 0,
            ]);

            return $voter;
        } catch (\Exception $e) {
            Log::error('Error importing voter data: ' . $e->getMessage());
            return null;
        }
    }
}
