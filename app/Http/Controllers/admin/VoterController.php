<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voters;
use App\Models\UserAddress;
use App\Models\ExtraInformation;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Imports\VotersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;




class VoterController extends Controller
{
    public function list(){
        $voters = Voters::orderBy('id', 'desc')->with('voterAddress')->get();
       //dd($voters);
        return view('admin.pages.voter.list',compact('voters'));
    }
    public function create(){
        return view('admin.pages.voter.create');
    }
    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'surname' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'nullable|integer|min:1|max:150',
            'dob' => 'required|date',
            'cast' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'voter_id' => 'required|string|max:255',
            'dead' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Handle optional image
        ]);

        $voterImagePath = null;
        if ($request->hasFile('image')) {
            $voterImage = $request->file('image');
            $voterImageName = time() . '_' . $voterImage->getClientOriginalName();
            $voterImage->move(public_path('voter_images'), $voterImageName);
            $voterImagePath = 'voter_images/' . $voterImageName;
        }

        // Create Voter record
        $voter = Voters::create([
            'first_name' => $request->first_name,
            'first_name_mr' =>  GoogleTranslate::trans($request->first_name, 'mr'),
            'first_name_hi' =>  GoogleTranslate::trans($request->first_name, 'hi'),
            'middle_name' => $request->middle_name,
            'middle_name_mr' =>  GoogleTranslate::trans($request->middle_name, 'mr'),
            'middle_name_hi' =>  GoogleTranslate::trans($request->middle_name, 'hi'),
            'surname' => $request->surname,
            'surname_mr' =>  GoogleTranslate::trans($request->surname, 'mr'),
            'surname_hi' =>  GoogleTranslate::trans($request->surname, 'hi'),
            'email' => $request->email,
            'image' => $voterImagePath,
            'gender' => $request->gender,
            'gender_mr' =>  GoogleTranslate::trans($request->gender, 'mr'),
            'gender_hi' =>  GoogleTranslate::trans($request->gender, 'hi'),
            'age' => $request->age,
            'dob' => $request->dob,
            'cast' => $request->cast,
            'cast_mr' =>  GoogleTranslate::trans($request->cast, 'mr'),
            'cast_hi' =>  GoogleTranslate::trans($request->cast, 'hi'),
            'position' => $request->position,
            'position_mr' =>  GoogleTranslate::trans($request->position, 'mr'),
            'position_hi' =>  GoogleTranslate::trans($request->position, 'hi'),
            'voter_id' => $request->voter_id,
            'dead' => $request->dead,
            'voted' => $request->voted,
            'star_voter' => $request->star_voter,
            'demands' => $request->demands,
            'demands_mr' =>  GoogleTranslate::trans($request->demands, 'mr'),
            'demands_hi' =>  GoogleTranslate::trans($request->demands, 'hi'),
            'colour_code' => $request->colour_code,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,

        ]);


        // Create UserAddress record
        UserAddress::create([
            'voter_user_id' =>$voter->id,
            'society' => $request->society,
            'society_mr' =>  GoogleTranslate::trans($request->society, 'mr'),
            'society_hi' =>  GoogleTranslate::trans($request->society, 'hi'),
            'house_no' => $request->house_no,
            'house_no_mr' =>  GoogleTranslate::trans($request->house_no, 'mr'),
            'house_no_hi' =>  GoogleTranslate::trans($request->house_no, 'hi'),
            'flat_no' => $request->flat_no,
            'flat_no_mr' =>  GoogleTranslate::trans($request->flat_no, 'mr'),
            'flat_no_hi' =>  GoogleTranslate::trans($request->flat_no, 'hi'),
            'address' => $request->address,
            'address_mr' =>  GoogleTranslate::trans($request->address, 'mr'),
            'address_hi' =>  GoogleTranslate::trans($request->address, 'hi'),
            'booth' => $request->booth,
            'booth_mr' =>  GoogleTranslate::trans($request->booth, 'mr'),
            'booth_hi' =>  GoogleTranslate::trans($request->booth, 'hi'),
            'village' => $request->village,
            'village_mr' =>  GoogleTranslate::trans($request->village, 'mr'),
            'village_hi' =>  GoogleTranslate::trans($request->village, 'hi'),
            'part_no' => $request->part_no,
            'part_no_mr' =>  GoogleTranslate::trans($request->part_no, 'mr'),
            'part_no_hi' =>  GoogleTranslate::trans($request->part_no, 'hi'),
            'srn' => $request->srn,
            'srn_mr' =>  GoogleTranslate::trans($request->srn, 'mr'),
            'srn_hi' =>  GoogleTranslate::trans($request->srn, 'hi'),
            'voting_centre' => $request->voting_centre,
            'voting_centre_mr' =>  GoogleTranslate::trans($request->voting_centre, 'mr'),
            'voting_centre_hi' =>  GoogleTranslate::trans($request->voting_centre, 'hi'),
            'taluka' => $request->taluka,
            'taluka_mr' =>  GoogleTranslate::trans($request->taluka, 'mr'),
            'taluka_hi' =>  GoogleTranslate::trans($request->taluka, 'hi'),
            'assembly' => $request->assembly,
            'assembly_mr' =>  GoogleTranslate::trans($request->assembly, 'mr'),
            'assembly_hi' =>  GoogleTranslate::trans($request->assembly, 'hi'),
            'address' => $request->address,
            'address_mr' =>  GoogleTranslate::trans($request->address, 'mr'),
            'address_hi' =>  GoogleTranslate::trans($request->address, 'hi'),
            'booth' => $request->booth,
            'booth_mr' =>  GoogleTranslate::trans($request->booth, 'mr'),
            'booth_hi' =>  GoogleTranslate::trans($request->booth, 'hi'),
            'village' => $request->village,
            'village_mr' =>  GoogleTranslate::trans($request->village, 'mr'),
            'village_hi' =>  GoogleTranslate::trans($request->village, 'hi'),


        ]);

        // Create ExtraInformation record
        ExtraInformation::create([
            'voter_user_id' => $voter->id,
            'extra_info_1' => $request->extra_info_1,
            'extra_info_1_mr' =>  GoogleTranslate::trans($request->extra_info_1, 'mr'),
            'extra_info_1_hi' =>  GoogleTranslate::trans($request->extra_info_1, 'hi'),
            'extra_info_2' => $request->extra_info_2,
            'extra_info_2_mr' =>  GoogleTranslate::trans($request->extra_info_2, 'mr'),
            'extra_info_2_hi' =>  GoogleTranslate::trans($request->extra_info_2, 'hi'),
            'extra_info_3' => $request->extra_info_3,
            'extra_info_3_mr' =>  GoogleTranslate::trans($request->extra_info_3, 'mr'),
            'extra_info_3_hi' =>  GoogleTranslate::trans($request->extra_info_3, 'hi'),
            'extra_info_4' => $request->extra_info_4,
            'extra_info_4_mr' =>  GoogleTranslate::trans($request->extra_info_4, 'mr'),
            'extra_info_4_hi' =>  GoogleTranslate::trans($request->extra_info_4, 'hi'),
            'extra_info_5' => $request->extra_info_5,
            'extra_info_5_mr' =>  GoogleTranslate::trans($request->extra_info_5, 'mr'),
            'extra_info_5_hi' =>  GoogleTranslate::trans($request->extra_info_5, 'hi'),
            'extra_check_1' => $request->extra_check_1,
            'extra_check_2' => $request->extra_check_2,
        ]);

        return redirect()->route('admin.voter.edit',$voter->id)->with('success', 'Voter created successfully.');
    }

    public function edit($id){
        $voter = Voters::find($id);
        return view('admin.pages.voter.edit',compact('voter'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'surname' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'nullable|integer|min:1|max:150',
            'dob' => 'required|date',
            'cast' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'voter_id' => 'required|string|max:255',
            'dead' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Handle optional image
        ]);

        // Find the voter record
        $voter = Voters::findOrFail($id);

        // Handle image upload if a new image is provided
        $voterImagePath = $voter->image; // Default to existing image path
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($voter->image && file_exists(public_path($voter->image))) {
                unlink(public_path($voter->image));
            }

            $voterImage = $request->file('image');
            $voterImageName = time() . '_' . $voterImage->getClientOriginalName();
            $voterImage->move(public_path('voter_images'), $voterImageName);
            $voterImagePath = 'voter_images/' . $voterImageName;
        }

        // Update voter record
        $voter->update([
            'first_name' => $request->first_name,
            'first_name_mr' =>  $request->first_name_mr,
            'first_name_hi' =>  $request->first_name_hi,
            'middle_name' => $request->middle_name,
            'middle_name_mr' =>  $request->middle_name_mr,
            'middle_name_hi' =>  $request->middle_name_hi,
            'surname' => $request->surname,
            'surname_mr' =>  $request->surname_mr,
            'surname_hi' =>  $request->surname_hi,
            'email' => $request->email,
            'image' => $voterImagePath,
            'gender' => $request->gender,
            'gender_mr' =>  $request->gender_mr,
            'gender_hi' =>  $request->gender_hi,
            'age' => $request->age,

            'dob' => $request->dob,
            'cast' => $request->cast,
            'cast_mr' =>  $request->cast_mr,
            'cast_hi' =>  $request->cast_hi,
            'position' => $request->position,
            'position_mr' =>  $request->position_mr,
            'position_hi' =>  $request->position_hi,
            'voter_id' => $request->voter_id,
            'dead' => $request->dead,
            'voted' => $request->voted,
            'star_voter' => $request->star_voter,
        ]);

        // Update UserAddress record
        $userAddress = UserAddress::where('voter_user_id', $id)->first();
        if ($userAddress) {
            $userAddress->update([
                'society' => $request->society,
                'society_mr' =>  $request->society_mr,
                'society_hi' =>  $request->society_hi,
                'house_no' => $request->house_no,
                'house_no_mr' =>  $request->house_no_mr,
                'house_no_hi' =>  $request->house_no_hi,
                'flat_no' => $request->flat_no,
                'flat_no_mr' =>  $request->flat_no_mr,
                'flat_no_hi' =>  $request->flat_no_hi,
                'address' => $request->address,
                'address_mr' =>  $request->address_mr,
                'address_hi' =>  $request->address_hi,
                'booth' => $request->booth,
                'booth_mr' =>  $request->booth_mr,
                'booth_hi' =>  $request->booth_hi,
                'village' => $request->village,
                'village_mr' =>  $request->village_mr,
                'village_hi' =>  $request->village_hi,
                'part_no' => $request->part_no,
                'part_no_mr' =>  $request->part_no_mr,
                'part_no_hi' =>  $request->part_no_hi,
                'srn' => $request->srn,
                'srn_mr' =>  $request->srn_mr,
                'srn_hi' =>  $request->srn_hi,
                'voting_centre' => $request->voting_centre,
                'voting_centre_mr' =>  $request->voting_centre_mr,
                'voting_centre_hi' =>  $request->voting_centre_hi,
            ]);
        }

        // Update ExtraInformation record
        $extraInfo = ExtraInformation::where('voter_user_id', $id)->first();
        if ($extraInfo) {
            $extraInfo->update([
                'extra_info_1' => $request->extra_info_1,
                'extra_info_1_mr' =>  $request->extra_info_1_mr,
                'extra_info_1_hi' =>  $request->extra_info_1_hi,
                'extra_info_2' => $request->extra_info_2,
                'extra_info_2_mr' =>  $request->extra_info_2_mr,
                'extra_info_2_hi' =>  $request->extra_info_2_hi,
                'extra_info_3' => $request->extra_info_3,
                'extra_info_3_mr' =>  $request->extra_info_3_mr,
                'extra_info_3_hi' =>  $request->extra_info_3_hi,
                'extra_info_4' => $request->extra_info_4,
                'extra_info_4_mr' =>  $request->extra_info_4_mr,
                'extra_info_4_hi' =>  $request->extra_info_4_hi,
                'extra_info_5' => $request->extra_info_5,
                'extra_info_5_mr' =>  $request->extra_info_5_mr,
                'extra_info_5_hi' =>  $request->extra_info_5_hi,
                'extra_check_1' => $request->extra_check_1,
                'extra_check_2' => $request->extra_check_2,
            ]);
        }

        return redirect()->route('admin.voter.list')->with('success', 'Voter updated successfully.',compact('voter','userAddress','extraInfo'));
    }

    public function votersDataBulkUpload(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xls,xlsx,csv,ods',
    ]);

    try {
        $import = new VotersImport();
        Excel::import($import, $request->file('file'));
        Log::info('Bulk import completed.');
        return redirect()->back()->with('success', 'Data imported successfully!');
    } catch (\Exception $e) {
        Log::error('Error during import: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}
 public function delete($id){
    Voters::find($id)->delete();
    return redirect()->route('admin.voter.list')->with('success', 'Voter deleted successfully.');
 }

 public function details($id){
    $voter = Voters::find($id);
    return view('admin.pages.voter.details',compact('voter'));
}
}
