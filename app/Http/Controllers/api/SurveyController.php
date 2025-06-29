<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExtraInformation;
use App\Models\UserAddress;
use App\Models\Voters;
use App\Models\Karyakarta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function exportAllFamilies(Request $request) {
           // Validate the 'lang' parameter
           $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi', // Adding Hindi support
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $translator = new GoogleTranslate($request->lang);
        if ($request->lang == 'en') {
            $voters = Voters::with('voterAddress', 'voterInformation')->get();

            // Group voters by surname
            $votersGrouped = $voters->groupBy('surname');

            // Map the grouped data
            $families = $votersGrouped->map(function ($familyMembers, $surname) {
                return [
                    'surname' => $surname,
                    'members' => $familyMembers->map(function ($voter) {
                        return [
                            'id' => $voter->id,
                            'first_name' => $voter->first_name,
                            'middle_name' => $voter->middle_name,
                            'surname' => $voter->surname,
                            'email' => $voter->email,
                            'gender' => $voter->gender,
                            'age' => $voter->age,
                            'dob' => $voter->dob,
                            'cast' => $voter->cast,
                            'position' => $voter->position,
                            'voter_id' => $voter->voter_id,
                            'dead' => $voter->dead,
                            'voted' => $voter->voted,
                            'star_voter' => $voter->star_voter,
                            'colour_code' => $voter->colour_code,
                            'mobile_1' => $voter->mobile_1,
                            'mobile_2' => $voter->mobile_2,
                            'image' => \URL::to($voter->image),
                            'voter_address' => [
                                'society' => optional($voter->voterAddress)->society,
                                'house_no' => optional($voter->voterAddress)->house_no,
                                'flat_no' => optional($voter->voterAddress)->flat_no,
                                'booth' => optional($voter->voterAddress)->booth,
                                'village' => optional($voter->voterAddress)->village,
                                'part_no' => optional($voter->voterAddress)->part_no,
                                'srn' => optional($voter->voterAddress)->srn,
                                'voting_centre' => optional($voter->voterAddress)->voting_centre,
                            ],
                            'voter_information' => [
                                'extra_info_1' => optional($voter->voterInformation)->extra_info_1,
                                'extra_info_2' => optional($voter->voterInformation)->extra_info_2,
                                'extra_info_3' => optional($voter->voterInformation)->extra_info_3,
                                'extra_info_4' => optional($voter->voterInformation)->extra_info_4,
                                'extra_info_5' => optional($voter->voterInformation)->extra_info_5,
                                'extra_check_1' => optional($voter->voterInformation)->extra_check_1,
                                'extra_check_2' => optional($voter->voterInformation)->extra_check_2,
                            ],
                        ];
                    })->values(), // Reset array keys
                ];
            })->values(); // Reset array keys
            
            
            // Generate CSV
            $csvPath = public_path('uploads/family_voters_' . now()->format('Ymd_His') . '.csv');
            $file = fopen($csvPath, 'w');
        
            // Write CSV headers
            fputcsv($file, [
                'Surname', 'First Name', 'Middle Name', 'Email', 'Gender', 'Age', 'DOB', 'Cast', 'Position',
                'Voter ID', 'Dead', 'Voted', 'Star Voter', 'Colour Code', 'Mobile 1', 'Mobile 2', 'Image',
                'Society', 'House No', 'Flat No', 'Booth', 'Village', 'Part No', 'SRN', 'Voting Centre',
                'Extra Info 1', 'Extra Info 2', 'Extra Info 3', 'Extra Info 4', 'Extra Info 5',
                'Extra Check 1', 'Extra Check 2'
            ]);
        
            
        
            foreach ($families as $family) {
                foreach ($family['members'] as $member) {
                    fputcsv($file, [
                        $family['surname'],
                        $member['first_name'],
                        $member['middle_name'],
                        $member['email'],
                        $member['gender'],
                        $member['age'],
                        $member['dob'],
                        $member['cast'],
                        $member['position'],
                        $member['voter_id'],
                        $member['dead'],
                        $member['voted'],
                        $member['star_voter'],
                        $member['colour_code'],
                        $member['mobile_1'],
                        $member['mobile_2'],
                        $member['image'],
                        $member['voter_address']['society'],
                        $member['voter_address']['house_no'],
                        $member['voter_address']['flat_no'],
                        $member['voter_address']['booth'],
                        $member['voter_address']['village'],
                        $member['voter_address']['part_no'],
                        $member['voter_address']['srn'],
                        $member['voter_address']['voting_centre'],
                        $member['voter_information']['extra_info_1'],
                        $member['voter_information']['extra_info_2'],
                        $member['voter_information']['extra_info_3'],
                        $member['voter_information']['extra_info_4'],
                        $member['voter_information']['extra_info_5'],
                        $member['voter_information']['extra_check_1'],
                        $member['voter_information']['extra_check_2'],
                    ]);
                }
            }
        
            fclose($file);
        
            // Create ZIP
            $zipFileName = 'family_voters_' . Str::random(8) . '.zip';
            $zipPath = public_path('uploads/' . $zipFileName);
        
            $zip = new ZipArchive();
            if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
                $zip->addFile($csvPath, basename($csvPath));
                $zip->close();
                File::delete($csvPath); // Optional: delete original CSV after zip
            } else {
                return response()->json(['status' => 500, 'message' => 'Could not create ZIP file']);
            }
        
            $downloadUrl = url('uploads/' . $zipFileName);
        
            return response()->json([
                'status' => 200,
                'message' => 'ZIP file created successfully.',
                'download_url' => $downloadUrl
            ]);

            
        }
        else if ($request->lang == 'mr') {
            $voters = Voters::with('voterAddress', 'voterInformation')->get();
            // Group voters by surname
            $votersGrouped = $voters->groupBy('surname_mr');
            // Map the grouped data
            $families = $votersGrouped->map(function ($familyMembers, $surname) {
                return [
                    'surname' => $surname,
                    'members' => $familyMembers->map(function ($voter) {
                        return [
                            'id' => $voter->id,
                            'first_name' => $voter->first_name_mr,
                            'middle_name' => $voter->middle_name_mr,
                            'surname' => $voter->surname_mr,
                            'email' => $voter->email,
                            'gender' => $voter->gender_mr,
                            'age' => $voter->age,
                            'dob' => $voter->dob,
                            'cast' => $voter->cast_mr,
                            'position' => $voter->position_mr,
                            'voter_id' => $voter->voter_id,
                            'dead' => $voter->dead,
                            'voted' => $voter->voted,
                            'star_voter' => $voter->star_voter,
                            'colour_code' => $voter->colour_code,
                            'mobile_1' => $voter->mobile_1,
                            'mobile_2' => $voter->mobile_2,
                            'image' =>  \URL::to($voter->image),
                            'voter_address' => [
                                'society' => optional($voter->voterAddress)->society_mr,
                                'house_no' => optional($voter->voterAddress)->house_no_mr,
                                'flat_no' => optional($voter->voterAddress)->flat_no_mr,
                                'booth' => optional($voter->voterAddress)->booth_mr,
                                'village' => optional($voter->voterAddress)->village_mr,
                                'part_no' => optional($voter->voterAddress)->part_no_mr,
                                'srn' => optional($voter->voterAddress)->srn_mr,
                                'voting_centre' => optional($voter->voterAddress)->voting_centre_mr,
                            ],
                            'voter_information' => [
                                'extra_info_1' => optional($voter->voterInformation)->extra_info_1_mr,
                                'extra_info_2' => optional($voter->voterInformation)->extra_info_2_mr,
                                'extra_info_3' => optional($voter->voterInformation)->extra_info_3_mr,
                                'extra_info_4' => optional($voter->voterInformation)->extra_info_4_mr,
                                'extra_info_5' => optional($voter->voterInformation)->extra_info_5_mr,
                                'extra_check_1' => optional($voter->voterInformation)->extra_check_1,
                                'extra_check_2' => optional($voter->voterInformation)->extra_check_2,
                            ],
                        ];
                    })->values(), // Reset array keys
                ];
            })->values(); // Reset array keys

            // Generate CSV
            $csvPath = public_path('uploads/family_voters_' . now()->format('Ymd_His') . '.csv');
            $file = fopen($csvPath, 'w');
        
            // Write CSV headers
            fputcsv($file, [
                'Surname', 'First Name', 'Middle Name', 'Email', 'Gender', 'Age', 'DOB', 'Cast', 'Position',
                'Voter ID', 'Dead', 'Voted', 'Star Voter', 'Colour Code', 'Mobile 1', 'Mobile 2', 'Image',
                'Society', 'House No', 'Flat No', 'Booth', 'Village', 'Part No', 'SRN', 'Voting Centre',
                'Extra Info 1', 'Extra Info 2', 'Extra Info 3', 'Extra Info 4', 'Extra Info 5',
                'Extra Check 1', 'Extra Check 2'
            ]);
        
            
        
            foreach ($families as $family) {
                foreach ($family['members'] as $member) {
                    fputcsv($file, [
                        $family['surname'],
                        $member['first_name'],
                        $member['middle_name'],
                        $member['email'],
                        $member['gender'],
                        $member['age'],
                        $member['dob'],
                        $member['cast'],
                        $member['position'],
                        $member['voter_id'],
                        $member['dead'],
                        $member['voted'],
                        $member['star_voter'],
                        $member['colour_code'],
                        $member['mobile_1'],
                        $member['mobile_2'],
                        $member['image'],
                        $member['voter_address']['society'],
                        $member['voter_address']['house_no'],
                        $member['voter_address']['flat_no'],
                        $member['voter_address']['booth'],
                        $member['voter_address']['village'],
                        $member['voter_address']['part_no'],
                        $member['voter_address']['srn'],
                        $member['voter_address']['voting_centre'],
                        $member['voter_information']['extra_info_1'],
                        $member['voter_information']['extra_info_2'],
                        $member['voter_information']['extra_info_3'],
                        $member['voter_information']['extra_info_4'],
                        $member['voter_information']['extra_info_5'],
                        $member['voter_information']['extra_check_1'],
                        $member['voter_information']['extra_check_2'],
                    ]);
                }
            }
        
            fclose($file);
        
            // Create ZIP
            $zipFileName = 'family_voters_' . Str::random(8) . '.zip';
            $zipPath = public_path('uploads/' . $zipFileName);
        
            $zip = new ZipArchive();
            if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
                $zip->addFile($csvPath, basename($csvPath));
                $zip->close();
                File::delete($csvPath); // Optional: delete original CSV after zip
            } else {
                return response()->json(['status' => 500, 'message' => 'Could not create ZIP file']);
            }
        
            $downloadUrl = url('uploads/' . $zipFileName);
        
            return response()->json([
                'status' => 200,
                'message' => 'ZIP file created successfully.',
                'download_url' => $downloadUrl
            ]);
        }
        else if ($request->lang == 'hi') {
            $voters = Voters::with('voterAddress', 'voterInformation')->get();
            $votersGrouped = $voters->groupBy('surname_hi');
            $families = $votersGrouped->map(function ($familyMembers, $surname) {
            return [
                    'surname' => $surname,
                    'members' => $familyMembers->map(function ($voter) {
                        return [
                            'id' => $voter->id,
                            'first_name' => $voter->first_name_hi,
                            'middle_name' => $voter->middle_name_hi,
                            'surname' => $voter->surname_hi,
                            'email' => $voter->email,
                            'gender' => $voter->gender_hi,
                            'age' => $voter->age,
                            'dob' => $voter->dob,
                            'cast' => $voter->cast_hi,
                            'position' => $voter->position_hi,
                            'voter_id' => $voter->voter_id,
                            'dead' => $voter->dead,
                            'voted' => $voter->voted,
                            'star_voter' => $voter->star_voter,
                            'colour_code' => $voter->colour_code,
                            'mobile_1' => $voter->mobile_1,
                            'mobile_2' => $voter->mobile_2,
                            'image' =>  \URL::to($voter->image),
                            'voter_address' => [
                                'society' => optional($voter->voterAddress)->society_hi,
                                'house_no' => optional($voter->voterAddress)->house_no_hi,
                                'flat_no' => optional($voter->voterAddress)->flat_no_hi,
                                'booth' => optional($voter->voterAddress)->booth_hi,
                                'village' => optional($voter->voterAddress)->village_hi,
                                'part_no' => optional($voter->voterAddress)->part_no_hi,
                                'srn' => optional($voter->voterAddress)->srn_hi,
                                'voting_centre' => optional($voter->voterAddress)->voting_centre_hi,
                            ],
                            'voter_information' => [
                                'extra_info_1' => optional($voter->voterInformation)->extra_info_1_hi,
                                'extra_info_2' => optional($voter->voterInformation)->extra_info_2_hi,
                                'extra_info_3' => optional($voter->voterInformation)->extra_info_3_hi,
                                'extra_info_4' => optional($voter->voterInformation)->extra_info_4_hi,
                                'extra_info_5' => optional($voter->voterInformation)->extra_info_5_hi,
                                'extra_check_1' => optional($voter->voterInformation)->extra_check_1,
                                'extra_check_2' => optional($voter->voterInformation)->extra_check_2,
                            ],
                        ];
                    })->values(), // Reset array keys
                ];
            })->values(); // Reset array keys
            
            // Generate CSV
            $csvPath = public_path('uploads/family_voters_' . now()->format('Ymd_His') . '.csv');
            $file = fopen($csvPath, 'w');
        
            // Write CSV headers
            fputcsv($file, [
                'Surname', 'First Name', 'Middle Name', 'Email', 'Gender', 'Age', 'DOB', 'Cast', 'Position',
                'Voter ID', 'Dead', 'Voted', 'Star Voter', 'Colour Code', 'Mobile 1', 'Mobile 2', 'Image',
                'Society', 'House No', 'Flat No', 'Booth', 'Village', 'Part No', 'SRN', 'Voting Centre',
                'Extra Info 1', 'Extra Info 2', 'Extra Info 3', 'Extra Info 4', 'Extra Info 5',
                'Extra Check 1', 'Extra Check 2'
            ]);
        
            
        
            foreach ($families as $family) {
                foreach ($family['members'] as $member) {
                    fputcsv($file, [
                        $family['surname'],
                        $member['first_name'],
                        $member['middle_name'],
                        $member['email'],
                        $member['gender'],
                        $member['age'],
                        $member['dob'],
                        $member['cast'],
                        $member['position'],
                        $member['voter_id'],
                        $member['dead'],
                        $member['voted'],
                        $member['star_voter'],
                        $member['colour_code'],
                        $member['mobile_1'],
                        $member['mobile_2'],
                        $member['image'],
                        $member['voter_address']['society'],
                        $member['voter_address']['house_no'],
                        $member['voter_address']['flat_no'],
                        $member['voter_address']['booth'],
                        $member['voter_address']['village'],
                        $member['voter_address']['part_no'],
                        $member['voter_address']['srn'],
                        $member['voter_address']['voting_centre'],
                        $member['voter_information']['extra_info_1'],
                        $member['voter_information']['extra_info_2'],
                        $member['voter_information']['extra_info_3'],
                        $member['voter_information']['extra_info_4'],
                        $member['voter_information']['extra_info_5'],
                        $member['voter_information']['extra_check_1'],
                        $member['voter_information']['extra_check_2'],
                    ]);
                }
            }
        
            fclose($file);
        
            // Create ZIP
            $zipFileName = 'family_voters_' . Str::random(8) . '.zip';
            $zipPath = public_path('uploads/' . $zipFileName);
        
            $zip = new ZipArchive();
            if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
                $zip->addFile($csvPath, basename($csvPath));
                $zip->close();
                File::delete($csvPath); // Optional: delete original CSV after zip
            } else {
                return response()->json(['status' => 500, 'message' => 'Could not create ZIP file']);
            }
        
            $downloadUrl = url('uploads/' . $zipFileName);
        
            return response()->json([
                'status' => 200,
                'message' => 'ZIP file created successfully.',
                'download_url' => $downloadUrl
            ]);
        }
    }

    public function exportAllModifiedFamilies(Request $request) {
       // Validate the 'lang' parameter
       $validator = Validator::make($request->all(), [
        'lang' => 'required|in:en,mr,hi', // Adding Hindi support
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $translator = new GoogleTranslate($request->lang);
        if ($request->lang == 'en') {
            $voters = Voters::with('voterAddress', 'voterInformation')->whereColumn('created_at', '!=', 'updated_at')->get();

            // Group voters by surname
            $votersGrouped = $voters->groupBy('surname');

            // Map the grouped data
            $families = $votersGrouped->map(function ($familyMembers, $surname) {
                return [
                    'surname' => $surname,
                    'members' => $familyMembers->map(function ($voter) {
                        return [
                            'id' => $voter->id,
                            'first_name' => $voter->first_name,
                            'middle_name' => $voter->middle_name,
                            'surname' => $voter->surname,
                            'email' => $voter->email,
                            'gender' => $voter->gender,
                            'age' => $voter->age,
                            'dob' => $voter->dob,
                            'cast' => $voter->cast,
                            'position' => $voter->position,
                            'voter_id' => $voter->voter_id,
                            'dead' => $voter->dead,
                            'voted' => $voter->voted,
                            'star_voter' => $voter->star_voter,
                            'colour_code' => $voter->colour_code,
                            'mobile_1' => $voter->mobile_1,
                            'mobile_2' => $voter->mobile_2,
                            'image' => $voter->image,
                            'voter_address' => [
                                'society' => optional($voter->voterAddress)->society,
                                'house_no' => optional($voter->voterAddress)->house_no,
                                'flat_no' => optional($voter->voterAddress)->flat_no,
                                'booth' => optional($voter->voterAddress)->booth,
                                'village' => optional($voter->voterAddress)->village,
                                'part_no' => optional($voter->voterAddress)->part_no,
                                'srn' => optional($voter->voterAddress)->srn,
                                'voting_centre' => optional($voter->voterAddress)->voting_centre,
                            ],
                            'voter_information' => [
                                'extra_info_1' => optional($voter->voterInformation)->extra_info_1,
                                'extra_info_2' => optional($voter->voterInformation)->extra_info_2,
                                'extra_info_3' => optional($voter->voterInformation)->extra_info_3,
                                'extra_info_4' => optional($voter->voterInformation)->extra_info_4,
                                'extra_info_5' => optional($voter->voterInformation)->extra_info_5,
                                'extra_check_1' => optional($voter->voterInformation)->extra_check_1,
                                'extra_check_2' => optional($voter->voterInformation)->extra_check_2,
                            ],
                        ];
                    })->values(), // Reset array keys
                ];
            })->values(); // Reset array keys

            // Prepare the response data
            return response()->json([
                'status' => 200,
                'message' => 'All Voters List in English',
                'voters' => $families
            ]);
        }
        else if ($request->lang == 'mr') {
            $voters = Voters::with('voterAddress', 'voterInformation')->whereColumn('created_at', '!=', 'updated_at')->get();
            // Group voters by surname
            $votersGrouped = $voters->groupBy('surname_mr');
            // Map the grouped data
            $families = $votersGrouped->map(function ($familyMembers, $surname) {
                return [
                    'surname' => $surname,
                    'members' => $familyMembers->map(function ($voter) {
                        return [
                            'id' => $voter->id,
                            'first_name' => $voter->first_name_mr,
                            'middle_name' => $voter->middle_name_mr,
                            'surname' => $voter->surname_mr,
                            'email' => $voter->email,
                            'gender' => $voter->gender_mr,
                            'age' => $voter->age,
                            'dob' => $voter->dob,
                            'cast' => $voter->cast_mr,
                            'position' => $voter->position_mr,
                            'voter_id' => $voter->voter_id,
                            'dead' => $voter->dead,
                            'voted' => $voter->voted,
                            'star_voter' => $voter->star_voter,
                            'colour_code' => $voter->colour_code,
                            'mobile_1' => $voter->mobile_1,
                            'mobile_2' => $voter->mobile_2,
                            'image' => $voter->image,
                            'voter_address' => [
                                'society' => optional($voter->voterAddress)->society_mr,
                                'house_no' => optional($voter->voterAddress)->house_no_mr,
                                'flat_no' => optional($voter->voterAddress)->flat_no_mr,
                                'booth' => optional($voter->voterAddress)->booth_mr,
                                'village' => optional($voter->voterAddress)->village_mr,
                                'part_no' => optional($voter->voterAddress)->part_no_mr,
                                'srn' => optional($voter->voterAddress)->srn_mr,
                                'voting_centre' => optional($voter->voterAddress)->voting_centre_mr,
                            ],
                            'voter_information' => [
                                'extra_info_1' => optional($voter->voterInformation)->extra_info_1_mr,
                                'extra_info_2' => optional($voter->voterInformation)->extra_info_2_mr,
                                'extra_info_3' => optional($voter->voterInformation)->extra_info_3_mr,
                                'extra_info_4' => optional($voter->voterInformation)->extra_info_4_mr,
                                'extra_info_5' => optional($voter->voterInformation)->extra_info_5_mr,
                                'extra_check_1' => optional($voter->voterInformation)->extra_check_1,
                                'extra_check_2' => optional($voter->voterInformation)->extra_check_2,
                            ],
                        ];
                    })->values(), // Reset array keys
                ];
            })->values(); // Reset array keys

            // Prepare the response data
            return response()->json([
                'status' => 200,
                'message' => 'All Voters List in marathi',
                'voters' => $families
            ]);
        }
        else if ($request->lang == 'hi') {
            $voters = Voters::with('voterAddress', 'voterInformation')->whereColumn('created_at', '!=', 'updated_at')->get();
            $votersGrouped = $voters->groupBy('surname_hi');
            $families = $votersGrouped->map(function ($familyMembers, $surname) {
            return [
                    'surname' => $surname,
                    'members' => $familyMembers->map(function ($voter) {
                        return [
                            'id' => $voter->id,
                            'first_name' => $voter->first_name_hi,
                            'middle_name' => $voter->middle_name_hi,
                            'surname' => $voter->surname_hi,
                            'email' => $voter->email,
                            'gender' => $voter->gender_hi,
                            'age' => $voter->age,
                            'dob' => $voter->dob,
                            'cast' => $voter->cast_hi,
                            'position' => $voter->position_hi,
                            'voter_id' => $voter->voter_id,
                            'dead' => $voter->dead,
                            'voted' => $voter->voted,
                            'star_voter' => $voter->star_voter,
                            'colour_code' => $voter->colour_code,
                            'mobile_1' => $voter->mobile_1,
                            'mobile_2' => $voter->mobile_2,
                            'image' => $voter->image,
                            'voter_address' => [
                                'society' => optional($voter->voterAddress)->society_hi,
                                'house_no' => optional($voter->voterAddress)->house_no_hi,
                                'flat_no' => optional($voter->voterAddress)->flat_no_hi,
                                'booth' => optional($voter->voterAddress)->booth_hi,
                                'village' => optional($voter->voterAddress)->village_hi,
                                'part_no' => optional($voter->voterAddress)->part_no_hi,
                                'srn' => optional($voter->voterAddress)->srn_hi,
                                'voting_centre' => optional($voter->voterAddress)->voting_centre_hi,
                            ],
                            'voter_information' => [
                                'extra_info_1' => optional($voter->voterInformation)->extra_info_1_hi,
                                'extra_info_2' => optional($voter->voterInformation)->extra_info_2_hi,
                                'extra_info_3' => optional($voter->voterInformation)->extra_info_3_hi,
                                'extra_info_4' => optional($voter->voterInformation)->extra_info_4_hi,
                                'extra_info_5' => optional($voter->voterInformation)->extra_info_5_hi,
                                'extra_check_1' => optional($voter->voterInformation)->extra_check_1,
                                'extra_check_2' => optional($voter->voterInformation)->extra_check_2,
                            ],
                        ];
                    })->values(), // Reset array keys
                ];
            })->values(); // Reset array keys
            return response()->json([
                'status' => 200,
                'message' => 'All Voters List in Hindi',
                'voters' => $families
            ]);
        }
    }

    public function resetVotedMarking(){
        $updatedRows = Voters::where('voted', 1)->update(['voted' => 0]);
        return response()->json([
            'status' => 200,
            'message' => "Record updated successfully",
            'voters' => $updatedRows
        ]);
    }

    public function resetMasterData(){
        $deletedRows = Karyakarta::truncate();
        return response()->json([
            'status' => 200,
            'message' => "Record updated successfully",
            'voters' => $deletedRows
        ]);
    }
}
