<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Carbon\Carbon;
use App\Models\UserAddress;
use App\Models\Voters;

class AlldataController extends Controller
{
    public function alldataByAllVillage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi', // Adding Hindi support
        ]);
        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 400);
        }
        $translator = new GoogleTranslate($request->lang);
            if ($request->lang == 'en') {
                try {
                    $villages = UserAddress::select('village')
                    ->distinct() // Fetch unique villages
                    ->get();
                    // dd($villages);
                    // Prepare response
                $response = $villages->map(function ($village) {
                    // Fetch voters for this village
                    $voters = UserAddress::where('village', $village->village)->get();
                    // dd($voters);
                    return [
                        'village' => $village->village,
                        'voters' => $voters->map(function ($voter) {
                            return [
                                'id' => $voter->id,
                                'first_name' => $voter->voter->first_name,
                                'middle_name' => $voter->voter->middle_name,
                                'surname' => $voter->voter->surname,
                                'email' => $voter->voter->email,
                                'gender' => $voter->voter->gender,
                                'age' => $voter->voter->age,
                                'voter_id' => $voter->voter->voter_id,
                                'star_voter' => $voter->voter->star_voter,
                                'voted' => $voter->voter->voted,
                                'dob' => $voter->voter->dob,
                                'cast' => $voter->voter->cast,
                                'position' => $voter->voter->position,
                                'personnel' => $voter->voter->personnel,
                                'mobile_1' => $voter->voter->mobile_1,
                                'mobile_2' => $voter->voter->mobile_2,
                                'image' => $voter->voter->image,
                                'address' => $voter->address,
                                'society' => $voter->society,
                                'flat_no' => $voter->flat_no,
                                'part_no' => $voter->part_no,
                                'voting_centre' => $voter->voting_centre,
                                'taluka' => $voter->taluka,
                                'village' => $voter->village,
                                'srn' => $voter->srn,
                                'house_no' => $voter->house_no,
                                'booth' => $voter->booth,
                                'assembly' => $voter->assembly,
                                'extra_info_1' => $voter->voterInformation->extra_info_1,
                                'extra_info_2' => $voter->voterInformation->extra_info_2,
                                'extra_info_3' => $voter->voterInformation->extra_info_3,
                                'extra_info_4' => $voter->voterInformation->extra_info_4,
                                'extra_info_5' => $voter->voterInformation->extra_info_5,
                                'extra_check_1' => $voter->voterInformation->extra_check_1,
                                'extra_check_2' => $voter->voterInformation->extra_check_2,


                            ];
                        })
                    ];
                });

                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'All Voters List by Village in English',
                    'villages' => $response
                ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 500,
                        'message' => 'An error occurred while fetching data.',
                        'error' => $e->getMessage()
                    ]);
                }
            }

            if ($request->lang == 'mr') {
                try {
                    $villages = UserAddress::select('village_mr')
                    ->distinct() // Fetch unique villages
                    ->get();
                    // dd($villages);
                    // Prepare response
                $response = $villages->map(function ($village) {
                    // Fetch voters for this village
                    $voters = UserAddress::where('village_mr', $village->village_mr)->get();
                    // dd($voters);
                    return [
                        'village' => $village->village_mr,
                        'voters' => $voters->map(function ($voter) {
                            return [
                                'id' => $voter->id,
                                'first_name' => $voter->voter->first_name_mr,
                                'middle_name' => $voter->voter->middle_name_mr,
                                'surname' => $voter->voter->surname_mr,
                                'email' => $voter->voter->email,
                                'gender' => $voter->voter->gender_mr,
                                'age' => $voter->voter->age,
                                'voter_id' => $voter->voter->voter_id,
                                'star_voter' => $voter->voter->star_voter,
                                'voted' => $voter->voter->voted,
                                'dob' => $voter->voter->dob,
                                'cast' => $voter->voter->cast_mr,
                                'position' => $voter->voter->position_mr,
                                'personnel' => $voter->voter->personnel,
                                'mobile_1' => $voter->voter->mobile_1,
                                'mobile_2' => $voter->voter->mobile_2,
                                'image' => $voter->voter->image,
                                'address' => $voter->address_mr,
                                'society' => $voter->society_mr,
                                'flat_no' => $voter->flat_no_mr,
                                'part_no' => $voter->part_no_mr,
                                'voting_centre' => $voter->voting_centre_mr,
                                'taluka' => $voter->taluka_mr,
                                'village' => $voter->village_mr,
                                'srn' => $voter->srn_mr,
                                'house_no' => $voter->house_no_mr,
                                'booth' => $voter->booth_mr,
                                'assembly' => $voter->assembly_mr,
                                'extra_info_1' => $voter->voterInformation->extra_info_1_mr,
                                'extra_info_2' => $voter->voterInformation->extra_info_2_mr,
                                'extra_info_3' => $voter->voterInformation->extra_info_3_mr,
                                'extra_info_4' => $voter->voterInformation->extra_info_4_mr,
                                'extra_info_5' => $voter->voterInformation->extra_info_5_mr,
                                'extra_check_1' => $voter->voterInformation->extra_check_1,
                                'extra_check_2' => $voter->voterInformation->extra_check_2,
                            ];
                        })
                    ];
                });

                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'All Voters List by Village in Marathi',
                    'villages' => $response
                ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 500,
                        'message' => 'An error occurred while fetching data.',
                        'error' => $e->getMessage()
                    ]);
                }
            }

            if ($request->lang == 'hi') {
                try {
                    $villages = UserAddress::select('village_hi')
                    ->distinct() // Fetch unique villages
                    ->get();
                    // dd($villages);
                    // Prepare response
                $response = $villages->map(function ($village) {
                    // Fetch voters for this village
                    $voters = UserAddress::where('village_hi', $village->village_hi)->get();
                    // dd($voters);
                    return [
                        'village' => $village->village_hi,
                        'voters' => $voters->map(function ($voter) {
                            return [
                                'id' => $voter->id,
                                'first_name' => $voter->voter->first_name_hi,
                                'middle_name' => $voter->voter->middle_name_hi,
                                'surname' => $voter->voter->surname_hi,
                                'email' => $voter->voter->email,
                                'gender' => $voter->voter->gender_hi,
                                'age' => $voter->voter->age,
                                'voter_id' => $voter->voter->voter_id,
                                'star_voter' => $voter->voter->star_voter,
                                'voted' => $voter->voter->voted,
                                'dob' => $voter->voter->dob,
                                'cast' => $voter->voter->cast_hi,
                                'position' => $voter->voter->position_hi,
                                'personnel' => $voter->voter->personnel,
                                'mobile_1' => $voter->voter->mobile_1,
                                'mobile_2' => $voter->voter->mobile_2,
                                'image' => $voter->voter->image,
                                'address' => $voter->address_hi,
                                'society' => $voter->society_hi,
                                'flat_no' => $voter->flat_no_hi,
                                'part_no' => $voter->part_no_hi,
                                'voting_centre' => $voter->voting_centre_hi,
                                'taluka' => $voter->taluka_hi,
                                'village' => $voter->village_hi,
                                'srn' => $voter->srn_hi,
                                'house_no' => $voter->house_no_hi,
                                'booth' => $voter->booth_hi,
                                'assembly' => $voter->assembly_hi,
                                'extra_info_1' => $voter->voterInformation->extra_info_1_hi,
                                'extra_info_2' => $voter->voterInformation->extra_info_2_hi,
                                'extra_info_3' => $voter->voterInformation->extra_info_3_hi,
                                'extra_info_4' => $voter->voterInformation->extra_info_4_hi,
                                'extra_info_5' => $voter->voterInformation->extra_info_5_hi,
                                'extra_check_1' => $voter->voterInformation->extra_check_1,
                                'extra_check_2' => $voter->voterInformation->extra_check_2,
                            ];
                        })
                    ];
                });

                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'All Voters List by Village in hindi',
                    'villages' => $response
                ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 500,
                        'message' => 'An error occurred while fetching data.',
                        'error' => $e->getMessage()
                    ]);
                }
            }
    }



    public function alldataByAllAssembly(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi', // Adding Hindi support
        ]);
        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 400);
        }
        $translator = new GoogleTranslate($request->lang);
            if ($request->lang == 'en') {
                try {
                    $assemblies = UserAddress::select('assembly')
                    ->distinct() // Fetch unique villages
                    ->get();
                    // dd($villages);
                    // Prepare response
                $response = $assemblies->map(function ($assembly) {
                    // Fetch voters for this village
                    $voters = UserAddress::where('assembly', $assembly->assembly)->get();
                    // dd($voters);
                    return [
                        'assembly' => $assembly->assembly,
                        'voters' => $voters->map(function ($voter) {
                            return [
                                'id' => $voter->id,
                                'first_name' => $voter->voter->first_name,
                                'middle_name' => $voter->voter->middle_name,
                                'surname' => $voter->voter->surname,

                                'email' => $voter->voter->email,
                                'gender' => $voter->voter->gender,
                                'age' => $voter->voter->age,
                                'voter_id' => $voter->voter->voter_id,
                                'star_voter' => $voter->voter->star_voter,
                                'voted' => $voter->voter->voted,
                                'dob' => $voter->voter->dob,
                                'cast' => $voter->voter->cast,
                                'position' => $voter->voter->position,
                                'mobile_1' => $voter->voter->mobile_1,
                                'mobile_2' => $voter->voter->mobile_2,
                                'image' => $voter->voter->image,
                                'address' => $voter->address,
                                'society' => $voter->society,
                                'flat_no' => $voter->flat_no,
                                'part_no' => $voter->part_no,
                                'voting_centre' => $voter->voting_centre,
                                'taluka' => $voter->taluka,
                                'village' => $voter->village,
                                'srn' => $voter->srn,
                                'house_no' => $voter->house_no,
                                'booth' => $voter->booth,
                                'assembly' => $voter->assembly,
                                'extra_info_1' => $voter->voterInformation->extra_info_1,
                                'extra_info_2' => $voter->voterInformation->extra_info_2,
                                'extra_info_3' => $voter->voterInformation->extra_info_3,
                                'extra_info_4' => $voter->voterInformation->extra_info_4,
                                'extra_info_5' => $voter->voterInformation->extra_info_5,
                                'extra_check_1' => $voter->voterInformation->extra_check_1,
                                'extra_check_2' => $voter->voterInformation->extra_check_2,
                            ];
                        })
                    ];
                });

                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'All Voters List by Assembly in English',
                    'assemblies' => $response
                ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 500,
                        'message' => 'An error occurred while fetching data.',
                        'error' => $e->getMessage()
                    ]);
                }
            }

            if ($request->lang == 'mr') {
                try {
                    $assemblies = UserAddress::select('assembly_mr')
                    ->distinct() // Fetch unique villages
                    ->get();
                    // dd($villages);
                    // Prepare response
                $response = $assemblies->map(function ($assembly) {
                    // Fetch voters for this village
                    $voters = UserAddress::where('assembly_mr', $assembly->assembly_mr)->get();
                    // dd($voters);
                    return [
                        'assembly' => $assembly->assembly_mr,
                        'voters' => $voters->map(function ($voter) {
                            return [
                                'id' => $voter->id,
                                'first_name' => $voter->voter->first_name_mr,
                                'middle_name' => $voter->voter->middle_name_mr,
                                'surname' => $voter->voter->surname_mr,
                                'email' => $voter->voter->email,
                                'gender' => $voter->voter->gender_mr,
                                'age' => $voter->voter->age,
                                'voter_id' => $voter->voter->voter_id,
                                'star_voter' => $voter->voter->star_voter,
                                'voted' => $voter->voter->voted,
                                'dob' => $voter->voter->dob,
                                'cast' => $voter->voter->cast_mr,
                                'position' => $voter->voter->position_mr,
                                'personnel' => $voter->voter->personnel,
                                'personnel' => $voter->voter->personnel,
                                'mobile_1' => $voter->voter->mobile_1,
                                'mobile_2' => $voter->voter->mobile_2,
                                'image' => $voter->voter->image,
                                'address' => $voter->address_mr,
                                'society' => $voter->society_mr,
                                'flat_no' => $voter->flat_no_mr,
                                'part_no' => $voter->part_no_mr,
                                'voting_centre' => $voter->voting_centre_mr,
                                'taluka' => $voter->taluka_mr,
                                'village' => $voter->village_mr,
                                'srn' => $voter->srn_mr,
                                'house_no' => $voter->house_no_mr,
                                'booth' => $voter->booth_mr,
                                'assembly' => $voter->assembly_mr,
                                'extra_info_1' => $voter->voterInformation->extra_info_1_mr,
                                'extra_info_2' => $voter->voterInformation->extra_info_2_mr,
                                'extra_info_3' => $voter->voterInformation->extra_info_3_mr,
                                'extra_info_4' => $voter->voterInformation->extra_info_4_mr,
                                'extra_info_5' => $voter->voterInformation->extra_info_5_mr,
                                'extra_check_1' => $voter->voterInformation->extra_check_1,
                                'extra_check_2' => $voter->voterInformation->extra_check_2,
                            ];
                        })
                    ];
                });

                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'All Voters List by Village in Marathi',
                    'villages' => $response
                ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 500,
                        'message' => 'An error occurred while fetching data.',
                        'error' => $e->getMessage()
                    ]);
                }
            }

            if ($request->lang == 'hi') {
                try {
                    $assemblies = UserAddress::select('assembly_hi')
                    ->distinct() // Fetch unique villages
                    ->get();

                    // Prepare response
                $response = $assemblies->map(function ($assembly) {
                    // Fetch voters for this village
                    $voters = UserAddress::where('assembly_hi', $assembly->assembly_hi)->get();
                    // dd($voters);
                    return [
                        'assembly' => $assembly->assembly_hi,
                        'voters' => $voters->map(function ($voter) {
                            return [
                                'id' => $voter->id,
                                'first_name' => $voter->voter->first_name_hi,
                                'middle_name' => $voter->voter->middle_name_hi,
                                'surname' => $voter->voter->surname_hi,
                                'email' => $voter->voter->email,
                                'gender' => $voter->voter->gender_hi,
                                'age' => $voter->voter->age,
                                'voter_id' => $voter->voter->voter_id,
                                'star_voter' => $voter->voter->star_voter,
                                'voted' => $voter->voter->voted,
                                'dob' => $voter->voter->dob,
                                'cast' => $voter->voter->cast_hi,
                                'position' => $voter->voter->position_hi,
                                'personnel' => $voter->voter->personnel,
                                'personnel' => $voter->voter->personnel,
                                'mobile_1' => $voter->voter->mobile_1,
                                'mobile_2' => $voter->voter->mobile_2,
                                'image' => $voter->voter->image,
                                'address' => $voter->address_hi,
                                'society' => $voter->society_hi,
                                'flat_no' => $voter->flat_no_hi,
                                'part_no' => $voter->part_no_hi,
                                'voting_centre' => $voter->voting_centre_hi,
                                'taluka' => $voter->taluka_hi,
                                'village' => $voter->village_hi,
                                'srn' => $voter->srn_hi,
                                'house_no' => $voter->house_no_hi,
                                'booth' => $voter->booth_hi,
                                'assembly' => $voter->assembly_hi,
                                'extra_info_1' => $voter->voterInformation->extra_info_1_hi,
                                'extra_info_2' => $voter->voterInformation->extra_info_2_hi,
                                'extra_info_3' => $voter->voterInformation->extra_info_3_hi,
                                'extra_info_4' => $voter->voterInformation->extra_info_4_hi,
                                'extra_info_5' => $voter->voterInformation->extra_info_5_hi,
                                'extra_check_1' => $voter->voterInformation->extra_check_1,
                                'extra_check_2' => $voter->voterInformation->extra_check_2,
                            ];
                        })
                    ];
                });

                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'All Voters List by Assembly in hindi',
                    'villages' => $response
                ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 500,
                        'message' => 'An error occurred while fetching data.',
                        'error' => $e->getMessage()
                    ]);
                }
            }
    }

    public function allPartnoDownloadList(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi', // Adding Hindi support
        ]);
        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 400);
        }
        $translator = new GoogleTranslate($request->lang);
            if ($request->lang == 'en') {
                $partnos = UserAddress::select('id','part_no')->get();
            }
            if ($request->lang == 'mr') {
                $partnos = UserAddress::select('id','part_no_mr')->get();
            }
            if ($request->lang == 'hi') {
                $partnos = UserAddress::select('id','part_no_hi')->get();
            }
            // Prepare the response data
            $data['status'] = 200;
            $data['message'] = 'All part no list';
            $data['voters'] = $partnos;

        return response()->json($data); // Return JSON response
    }

    public function allPhotoList(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'from' => 'required',
        //     'to' => 'required',
        // ]);
        if ($validator->fails()) {
           return response()->json(['error' => $validator->errors()], 400);
        }
        $votersImage = Voters::all();
        $baseUrl = 'https://rajneta.fusiontechlab.site/';

        // Filter out voters with null image and return their full image URL
        $votersWithImages = $votersImage->filter(function ($voter) {
            return !is_null($voter->image); // Only include voters with non-null image field
        });

        $votersWithImages = $votersWithImages->map(function ($voter) use ($baseUrl) {
            return [
                'id' => $voter->id,
                'image' => $baseUrl . $voter->image, // Append base URL to the image path
            ];
        });

        // Prepare the response data
        $data['status'] = 200;
        $data['message'] = 'All voters photo list';
        $data['base_url'] = $baseUrl;
        $data['voters'] = $votersWithImages;

        return response()->json($data); // Return JSON response
    }

    public function deleteOldPhotos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|integer',
            'to' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $from = $request->from;
        $to = $request->to;

        // Fetch voters within the ID range
        $voters = Voters::whereBetween('id', [$from, $to])->get();

        if ($voters->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No voters found in the given ID range.'
            ], 404);
        }

        foreach ($voters as $voter) {
            if ($voter->image) {
                $imagePath = public_path($voter->image); // Get full image path

                // Check if file exists, then delete it
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                // Set image field to null
                $voter->update(['image' => null]);
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'Voter images deleted successfully for the given ID range.',
        ]);
    }

    public function downloadOldPhotos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|integer',
            'to' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $from = $request->from;
        $to = $request->to;

        // Fetch voters with images within the given ID range
        $voters = Voters::whereBetween('id', [$from, $to])
            ->whereNotNull('image')
            ->get();

        if ($voters->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No voter images found in the given ID range.'
            ], 404);
        }

        $baseUrl = 'https://rajneta.fusiontechlab.site/';

        // Map the images to return a structured response
        $voterImages = $voters->map(function ($voter) use ($baseUrl) {
            return [
                'id' => $voter->id,
                'image' => $baseUrl .  $voter->image, // Append base URL to image path
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Voter images retrieved successfully.',
            'images' => $voterImages
        ]);
    }


}


