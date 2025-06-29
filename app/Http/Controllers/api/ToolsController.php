<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtraInformation;
use App\Models\UserAddress;
use App\Models\Voters;
use App\Models\NewAddress;
use App\Models\SmsPermission;
use App\Models\BluetoothSlipPermission;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ToolsController extends Controller
{
    public function bluetoothSetting(Request $request)
    {
        // Validate the 'lang' parameter
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi', // Adding Hindi support
            'voter_user_id' => 'required|exists:voters,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $translator = new GoogleTranslate($request->lang);
        $baseUrl = 'https://rajneta.fusiontechlab.site/';
        $voter = Voters::with('voterAddress','voterInformation')->findOrFail($request->voter_user_id);
        $translatedPartyName = $translator->translate('Demo Party Name');
        // Determine header image path based on environment (consider using environment variables)
        $headerImagePath = $baseUrl.'public/header_image/header_image.png';
        $bluetoothPermission = BluetoothSlipPermission::first();

        if($request->lang == 'en'){
            $responseData = [
                'first_name' => $voter->first_name,
                'surname' => $voter->surname,
                'middlename' => $voter->middle_name,
                'srn' => $voter->voterAddress->srn ?? null,
                'part_no' => $voter->voterAddress->part_no ?? null,
                'voter_id' => $voter->voter_id,
                'party_name' => $translatedPartyName,
                'header_image' => $headerImagePath,
            ];

            if ( $bluetoothPermission->description == 1) {
                $responseData['description'] = "Demo Description";
            }

            if ( $bluetoothPermission->booth == 1) {
                $responseData['booth'] = $voter->voterAddress->booth ?? null;
            }

            if ( $bluetoothPermission->address == 1) {
                $responseData['address'] = $voter->address ?? null;
            }

            if ( $bluetoothPermission->house_no == 1) {
                $responseData['house_no'] = $voter->voterAddress->house_no ?? null;
            }




            // Step 4: Remove null values
            $filteredResponseData = array_filter($responseData, function ($value) {
                return !is_null($value);
            });

            // Step 5: Return the response
            return response()->json([
                'status' => 200,
                'message' => 'Bluetooth data data sent successfully in English',
                'data' => $responseData,
            ]);
        }
        if($request->lang == 'mr'){
            $responseData = [
                'first_name' => $voter->first_name_mr ?? null,
                'surname' => $voter->surname_mr ?? null,
                'middlename' => $voter->middle_name_mr ?? null,
                'srn' => $voter->voterAddress->srn_mr ?? null,
                'part_no' => $voter->voterAddress->part_no_mr ?? null,
                'voter_id' => $voter->voter_id,
                'party_name' => $translatedPartyName,
                'header_image' => $headerImagePath,
            ];

            if ($bluetoothPermission->description == 1) {
                $responseData['description'] = "डेमो वर्णन";
            }

            if ($bluetoothPermission->booth == 1) {
                $responseData['booth'] = $voter->voterAddress->booth_mr ?? null;
            }

            if ($bluetoothPermission->address == 1) {
                $responseData['address'] = $voter->address_mr ?? null;
            }

            if ($bluetoothPermission->house_no == 1) {
                $responseData['house_no'] = $voter->voterAddress->house_no_mr ?? null;
            }

            // Step 4: Remove null values
            $filteredResponseData = array_filter($responseData, function ($value) {
                return !is_null($value);
            });

            // Step 5: Return the response
            return response()->json([
                'status' => 200,
                'message' => 'Bluetooth data sent successfully in Marathi',
                'data' => $filteredResponseData,
            ]);
        }
        if($request->lang == 'hi'){
            $responseData = [
                'first_name' => $voter->first_name_hi ?? null,
                'surname' => $voter->surname_hi ?? null,
                'srn' => $voter->voterAddress->srn_hi ?? null,
                'part_no' => $voter->voterAddress->part_no_hi ?? null,
                'middlename' => $voter->middle_name_hi ?? null,
                'voter_id' => $voter->voter_id ?? null,
                'party_name' => $translatedPartyName,
                'header_image' => $headerImagePath,
            ];

            if ($bluetoothPermission->description == 1) {
                $responseData['description'] = "डेमो वर्णन";
            }

            if ($bluetoothPermission->booth == 1) {
                $responseData['booth'] = $voter->voterAddress->booth_hi ?? null;
            }

            if ($bluetoothPermission->address == 1) {
                $responseData['address'] = $voter->address_hi ?? null;
            }

            if ($bluetoothPermission->house_no == 1) {
                $responseData['house_no'] = $voter->voterAddress->house_no_hi ?? null;
            }

            // Step 4: Remove null values
            $filteredResponseData = array_filter($responseData, function ($value) {
                return !is_null($value);
            });

            // Step 5: Return the response
            return response()->json([
                'status' => 200,
                'message' => 'Bluetooth data sent successfully in Hindi',
                'data' => $filteredResponseData,
            ]);
        }


        return response()->json($data);
    }

   

    public function smsPermissionStore(Request $request)
    {
        // Step 1: Validate the request
        $validator = Validator::make($request->all(), [
            'description' => 'required|boolean',
            'middle_name_check' => 'required|boolean',
            'booth_check' => 'required|boolean',
            'assembly_name_check' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ], 400);
        }

        // Step 2: Check if the record exists for the given voter_user_id
        $voterPermission = SmsPermission::first();

        if ($voterPermission) {
            // Update the existing record
            $voterPermission->update([
                'description' => $request->description,
                'middle_name_check' => $request->middle_name_check,
                'booth_check' => $request->booth_check,
                'assembly_name_check' => $request->assembly_name_check,
            ]);

            $message = 'Sms permission updated successfully';
        } else {
            // Create a new record
            $voterPermission = SmsPermission::create([
                'description' => $request->description,
                'middle_name_check' => $request->middle_name_check,
                'booth_check' => $request->booth_check,
                'assembly_name_check' => $request->assembly_name_check,
            ]);

            $message = 'Sms permission stored successfully';
        }

        // Step 3: Return the response
        return response()->json([
            'status' => 200,
            'message' => $message,
            'data' => $voterPermission,
        ]);
    }

    public function smsSettings(Request $request)
    {
        // Step 1: Validate the request
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'voter_user_id' => 'required|exists:voters,id', // Ensures `id` exists in the `voters` table

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ], 400);
        }

        // Step 2: Retrieve the voter and related data
        $voter = Voters::with('voterAddress')->findOrFail($request->voter_user_id);
        $smsPermission = SmsPermission::first();

        // Step 3: Build the response data based on checks
        if($request->lang == 'en'){
            $responseData = [
                'first_name' => $voter->first_name,
                'surname' => $voter->surname,
                'srn' => $voter->voterAddress->srn ?? null,
                'part_no' => $voter->voterAddress->part_no ?? null,
                'voter_id' => $voter->voter_id,
            ];

            if ( $smsPermission->description == 1) {
                $responseData['description'] = "Demo Description";
            }

            if ( $smsPermission->assembly_name_check == 1) {
                $responseData['assembly_name'] = $voter->voterAddress->assembly ?? null;
            }

            if ( $smsPermission->middle_name_check == 1) {
                $responseData['middle_name'] = $voter->middle_name ?? null;
            }

            if ( $smsPermission->booth_check == 1) {
                $responseData['booth'] = $voter->voterAddress->booth ?? null;
            }




            // Step 4: Remove null values
            $filteredResponseData = array_filter($responseData, function ($value) {
                return !is_null($value);
            });

            // Step 5: Return the response
            return response()->json([
                'status' => 200,
                'message' => 'Sms data sent successfully in English',
                'data' => $responseData,
            ]);
        }
        if($request->lang == 'mr'){
            $responseData = [
                'first_name' => $voter->first_name_mr ?? null,
                'surname' => $voter->surname_mr ?? null,
                'srn' => $voter->voterAddress->srn_mr ?? null,
                'part_no' => $voter->voterAddress->part_no_mr ?? null,
                'voter_id' => $voter->voter_id,
            ];

            if ($smsPermission->description == 1) {
                $responseData['description'] = "डेमो वर्णन";
            }

            if ($smsPermission->assembly_name_check == 1) {
                $responseData['assembly_name'] = $voter->voterAddress->assembly_mr ?? null;
            }

            if ($smsPermission->middle_name_check == 1) {
                $responseData['middle_name'] = $voter->middle_name_mr ?? null;
            }

            if ($smsPermission->booth_check == 1) {
                $responseData['booth'] = $voter->voterAddress->booth_mr ?? null;
            }

            // Step 4: Remove null values
            $filteredResponseData = array_filter($responseData, function ($value) {
                return !is_null($value);
            });

            // Step 5: Return the response
            return response()->json([
                'status' => 200,
                'message' => 'Sms data sent successfully in Marathi',
                'data' => $filteredResponseData,
            ]);
        }
        if($request->lang == 'hi'){
            $responseData = [
                'first_name' => $voter->first_name_hi ?? null,
                'surname' => $voter->surname_hi ?? null,
                'srn' => $voter->voterAddress->srn_hi ?? null,
                'part_no' => $voter->voterAddress->part_no_hi ?? null,
                'voter_id' => $voter->voter_id,
            ];

            if ($smsPermission->description == 1) {
                $responseData['description'] = "डेमो वर्णन";
            }

            if ($smsPermission->assembly_name_check == 1) {
                $responseData['assembly_name'] = $voter->voterAddress->assembly_hi ?? null;
            }

            if ($smsPermission->middle_name_check == 1) {
                $responseData['middle_name'] = $voter->middle_name_hi ?? null;
            }

            if ($smsPermission->booth_check == 1) {
                $responseData['booth'] = $voter->voterAddress->booth_hi ?? null;
            }

            // Step 4: Remove null values
            $filteredResponseData = array_filter($responseData, function ($value) {
                return !is_null($value);
            });

            // Step 5: Return the response
            return response()->json([
                'status' => 200,
                'message' => 'Sms data sent successfully in Hindi',
                'data' => $filteredResponseData,
            ]);
        }

    }

    public function smsPermissionFetch(Request $request)
    {
        
        $voterPermission = SmsPermission::first();
        // Step 3: Return the response
        return response()->json([
            'status' => 200,
            'message' => 'Sms permission fetched successfully',
            'data' => $voterPermission,
        ]);
    }

    public function bluetoothPermissionStore(Request $request)
    {
        // Step 1: Validate the request
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'booth' => 'required|boolean',
            'address' => 'required|boolean',
            'house_no' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ], 400);
        }

        // Step 2: Check if the record exists for the given voter_user_id
        $bluetoothPermission = BluetoothSlipPermission::first();

        if ($bluetoothPermission) {
            // Update the existing record
            $bluetoothPermission->update([
                'description' => $request->description,
                'booth' => $request->booth,
                'address' => $request->address,
                'house_no' => $request->house_no,
            ]);

            $message = 'Bluetooth permission updated successfully';
        } else {
            // Create a new record
            $bluetoothPermission = BluetoothSlipPermission::create([
                // 'voter_user_id' => $request->voter_user_id,
                'description' => $request->description,
                'booth' => $request->booth,
                'address' => $request->address,
                'address' => $request->address,
            ]);

            $message = 'Bluetooth permission stored successfully';
        }

        // Step 3: Return the response
        return response()->json([
            'status' => 200,
            'message' => $message,
            'data' => $bluetoothPermission,
        ]);
    }

    public function bluetoothPermissionFetch(Request $request)
    {

        $voterPermission = BluetoothSlipPermission::first();
        // Step 3: Return the response
        return response()->json([
            'status' => 200,
            'message' => 'Bluetooth permission fetched successfully',
            'data' => $voterPermission,
        ]);
    }
}
