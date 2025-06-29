<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Society;
use App\Models\Address;
use App\Models\Karyakarta;
use App\Models\Caste;
use App\Models\position;
use App\Models\User;
use App\Models\Permission;
use App\Models\MasterPermission;
use App\Models\Profession;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class MasterController extends Controller
{


    public function societyCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'lang' => 'required|in:en,mr,hi',
            'society' => 'nullable|required_if:lang,en|string|max:255',
            'society_mr' => 'nullable|required_if:lang,mr|string|max:255',
            'society_hi' => 'nullable|required_if:lang,hi|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // $user = Auth::user();
        $userPermission = MasterPermission::where('user_id', $request->user_id)->first();
      
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->society_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You do not have permission to create a Society Master.'
            ], 403);
        }

        // Translation logic based on selected language
        $translatedEn = null;
        $translatedMr = null;
        $translatedHi = null;

        if ($request->lang == 'en' && $request->society) {
            $translatedEn = $request->society;
            $translatedMr = GoogleTranslate::trans($request->society, 'mr', 'en');
            $translatedHi = GoogleTranslate::trans($request->society, 'hi', 'en');
        } elseif ($request->lang == 'mr' && $request->society_mr) {
            $translatedMr = $request->society_mr;
            $translatedEn = GoogleTranslate::trans($request->society_mr, 'en', 'mr');
            $translatedHi = GoogleTranslate::trans($request->society_mr, 'hi', 'mr');
        } elseif ($request->lang == 'hi' && $request->society_hi) {
            $translatedHi = $request->society_hi;
            $translatedEn = GoogleTranslate::trans($request->society_hi, 'en', 'hi');
            $translatedMr = GoogleTranslate::trans($request->society_hi, 'mr', 'hi');
        }

        // Create a new society record
        $society = Society::create([
            'user_id' => $request->user_id,
            'society' => $translatedEn,
            'society_mr' => $translatedMr,
            'society_hi' => $translatedHi,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Society data created successfully',
            'society' => $society
        ], 200);
    }




    public function societySearch(Request $request)
    {
        // Validate the input parameters
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'query' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $query = $request->input('query');
        $user = Auth::user();
        $userPermission = Permission::where('user_id',$user->id)->first();
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->society_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You do not have permission to create a Society Master.'
            ], 403);
        }
        else{
            if($request->lang == 'en'){
                $societies = Society::where('society', 'LIKE', '%' . $query . '%')
                ->get();
                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'Society search results retrieved successfully',
                    'society' => $societies,

                ], 200);
            }
        }

    }

    public function societyListAllMasters(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $society = Society::where('user_id',$request->user_id)->get();
        $user = Auth::user();
        $userPermission = MasterPermission::where('user_id',$user->id)->first();
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->society_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You do not have permission to create a Society Master.'
            ], 403);
        }
        // elseif($user->is_admin == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin';
        //   return response()->json($data, 200);
        // }

        elseif($request->lang == 'en'){
                $society =  $society
                ->map(function ($societyGroup) {
                    return [
                        'id' => $societyGroup->id ?? null,
                        'society' => $societyGroup->society ?? null,
                    ];
                })->values();
                return response()->json([
                    'status' => 200,
                    'message' => 'Society list created by society master retrieved successfully in English',
                    'society' => $society,
                ], 200);
        }
        elseif($request->lang == 'mr'){
            $society =  $society
            ->map(function ($societyGroup) {
                return [
                    'id' => $societyGroup->id ?? null,
                    'society' => $societyGroup->society_mr ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'Society list created by society master retrieved successfully in Marathi',
                'society' => $society,
            ], 200);
        }
        else{
            $society =  $society
            ->map(function ($societyGroup) {
                return [
                    'id' => $societyGroup->id ?? null,
                    'society' => $societyGroup->society_hi ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'Society list created by society master retrieved successfully in Hindi',
                'society' => $society,
            ], 200);
        }
    }




    public function addressCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'lang' => 'required|in:en,mr,hi',
            'address' => 'nullable|required_if:lang,en|string|max:255',
            'address_mr' => 'nullable|required_if:lang,mr|string|max:255',
            'address_hi' => 'nullable|required_if:lang,hi|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // $user = Auth::user();
        $userPermission = MasterPermission::where('user_id', $request->user_id)->first();

        if (!$userPermission || (!($userPermission->all_permission || $userPermission->address_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You do not have permission to create a address.'
            ], 403);
        }
       
       
        // if (!$userPermission || $userPermission->address_master == 0) {
        //     return response()->json([
        //         'status' => 403,
        //         'message' => 'You are not an admin or society master'
        //     ], 403);
        // }

        // Translation logic based on selected language
        $translatedEn = null;
        $translatedMr = null;
        $translatedHi = null;

        if ($request->lang == 'en' && $request->address) {
            $translatedEn = $request->address;
            $translatedMr = GoogleTranslate::trans($request->address, 'mr', 'en');
            $translatedHi = GoogleTranslate::trans($request->address, 'hi', 'en');
        } elseif ($request->lang == 'mr' && $request->address_mr) {
            $translatedMr = $request->address_mr;
            $translatedEn = GoogleTranslate::trans($request->address_mr, 'en', 'mr');
            $translatedHi = GoogleTranslate::trans($request->address_mr, 'hi', 'mr');
        } elseif ($request->lang == 'hi' && $request->address_hi) {
            $translatedHi = $request->address_hi;
            $translatedEn = GoogleTranslate::trans($request->address_hi, 'en', 'hi');
            $translatedMr = GoogleTranslate::trans($request->address_hi, 'mr', 'hi');
        }

        // Create a new address record
        $address = Address::create([
            'user_id' => $request->user_id,
            'address' => $translatedEn,
            'address_mr' => $translatedMr,
            'address_hi' => $translatedHi,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Address data created successfully',
            'address' => $address
        ], 200);
    }





    public function addressSearch(Request $request)
    {
        // Validate the input parameters
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'query' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $query = $request->input('query');
        $user = Auth::user();
        $userPermission = Permission::where('user_id',$user->id)->first();
        
          // if($userPermission->address_master == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin or you are not address master';
        //   return response()->json($data, 200);
        // }
        
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->address_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin or you are not address master.'
            ], 403);
        }
        else{
            if($request->lang == 'en'){
                $address = Address::where('address', 'LIKE', '%' . $query . '%')
                ->get();
                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'Address search results retrieved successfully',
                    'address' => $address,

                ], 200);
            }
        }

    }

    public function addressListAllMasters(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $address = Address::where('user_id',$request->user_id)->get();
        $user = Auth::user();
        // dd($user);
        $userPermission = MasterPermission::where('user_id',$user->id)->first();
       
       if (!$userPermission || (!($userPermission->all_permission || $userPermission->address_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin or you are not address master.'
            ], 403);
        }
        // elseif($user->is_admin == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin';
        //   return response()->json($data, 200);
        // }
        elseif($request->lang == 'en'){
                $address =  $address
                ->map(function ($addressGroup) {
                    return [
                        'id' => $addressGroup->id ?? null,
                        'address' => $addressGroup->address ?? null,
                    ];
                })->values();
                return response()->json([
                    'status' => 200,
                    'message' => 'Address list created by address master retrieved successfully in English',
                    'address' => $address,
                ], 200);
        }
        elseif($request->lang == 'mr'){
            $address =  $address
            ->map(function ($addressGroup) {
                return [
                    'id' => $addressGroup->id ?? null,
                    'address' => $addressGroup->address_mr ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'Address list created by address master retrieved successfully in Marathi',
                'address' => $address,
            ], 200);
        }
        else{
            $address =  $address
            ->map(function ($addressGroup) {
                return [
                    'id' => $addressGroup->id ?? null,
                    'address' => $addressGroup->address_hi ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'Address list created by address master retrieved successfully in Hindi',
                'address' => $address,
            ], 200);
        }
    }

    public function karyakartaCreate(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'lang' => 'required|in:en,mr,hi',
            'karyakarta' => 'nullable|required_if:lang,en|string|max:255',
            'karyakarta_mr' => 'nullable|required_if:lang,mr|string|max:255',
            'karyakarta_hi' => 'nullable|required_if:lang,hi|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // $user = Auth::user();
        $userPermission = MasterPermission::where('user_id', $request->user_id)->first();

        if (!$userPermission || (!($userPermission->all_permission || $userPermission->karyakarta_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not an admin or karyakarta master.'
            ], 403);
        }
        
        // if (!$userPermission || $userPermission->karyakarta_master == 0) {
        //     return response()->json([
        //         'status' => 403,
        //         'message' => 'You are not an admin or karyakarta master'
        //     ], 403);
        // }

        // Translation logic based on selected language
        $translatedEn = null;
        $translatedMr = null;
        $translatedHi = null;

        if ($request->lang == 'en' && $request->karyakarta) {
            $translatedEn = $request->karyakarta;
            $translatedMr = GoogleTranslate::trans($request->karyakarta, 'mr', 'en');
            $translatedHi = GoogleTranslate::trans($request->karyakarta, 'hi', 'en');
        } elseif ($request->lang == 'mr' && $request->karyakarta_mr) {
            $translatedMr = $request->karyakarta_mr;
            $translatedEn = GoogleTranslate::trans($request->karyakarta_mr, 'en', 'mr');
            $translatedHi = GoogleTranslate::trans($request->karyakarta_mr, 'hi', 'mr');
        } elseif ($request->lang == 'hi' && $request->karyakarta_hi) {
            $translatedHi = $request->karyakarta_hi;
            $translatedEn = GoogleTranslate::trans($request->karyakarta_hi, 'en', 'hi');
            $translatedMr = GoogleTranslate::trans($request->karyakarta_hi, 'mr', 'hi');
        }

        // Create a new address record
        $karyakarta = Karyakarta::create([
            'user_id' => $request->user_id,
            'karyakarta' => $translatedEn,
            'karyakarta_mr' => $translatedMr,
            'karyakarta_hi' => $translatedHi,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Karyakarta data created successfully',
            'karyakarta' => $karyakarta
        ], 200);


    }

    public function karyakartaSearch(Request $request)
    {
        // Validate the input parameters
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'query' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $query = $request->input('query');
        $user = Auth::user();
        $userPermission = Permission::where('user_id',$user->id)->first();
        
        $userPermission = MasterPermission::where('user_id', $request->user_id)->first();

         if($userPermission->address_master == 0){
            $data['status'] = 200;
            $data['message'] = 'You are not admin or you are not address master';
           return response()->json($data, 200);
        }
        
        if($userPermission->karyakarta_master == 0){
            $data['status'] = 200;
            $data['message'] = 'You are not admin or you are not karyakarta master';
           return response()->json($data, 200);
        }
        else{
            if($request->lang == 'en'){
                $karyakarta = Karyakarta::where('karyakarta', 'LIKE', '%' . $query . '%')
                ->get();
                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'Karyakarta search results retrieved successfully',
                    'karyakarta' => $karyakarta,

                ], 200);
            }
        }
    }

    public function karyakartaListAllMasters(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $karyakarta = Karyakarta::where('user_id',$request->user_id)->get();
        $user = Auth::user();
        // dd($user);
        $userPermission = MasterPermission::where('user_id',$user->id)->first();
        
        // dd($userPermission);
        // if($userPermission->karyakarta_master == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin or you are not karyakarta master';
        //   return response()->json($data, 200);
        // }
        
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->karyakarta_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not an admin or karyakarta master.'
            ], 403);
        }
        // elseif($user->is_admin == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin';
        //   return response()->json($data, 200);
        // }
        elseif($request->lang == 'en'){
                $karyakarta =  $karyakarta
                ->map(function ($karyakartaGroup) {
                    return [
                        'id' => $karyakartaGroup->id ?? null,
                        'karyakarta' => $karyakartaGroup->karyakarta ?? null,
                    ];
                })->values();
                return response()->json([
                    'status' => 200,
                    'message' => 'Karyakarta list created by karyakarta master retrieved successfully in English',
                    'karyakarta' => $karyakarta,
                ], 200);
        }
        elseif($request->lang == 'mr'){
            $karyakarta =  $karyakarta
            ->map(function ($karyakartaGroup) {
                return [
                    'id' => $karyakartaGroup->id ?? null,
                    'karyakarta' => $karyakartaGroup->karyakarta_mr ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'Karyakarta list created by karyakarta master retrieved successfully in Marathi',
                'karyakarta' => $karyakarta,
            ], 200);
        }
        else{
            $karyakarta =  $karyakarta
            ->map(function ($karyakartaGroup) {
                return [
                    'id' => $karyakartaGroup->id ?? null,
                    'karyakarta' => $karyakartaGroup->karyakarta_hi ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'Karyakarta list created by address master retrieved successfully in Hindi',
                'karyakarta' => $karyakarta,
            ], 200);
        }
    }

    public function casteCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'lang' => 'required|in:en,mr,hi',
            'caste' => 'nullable|required_if:lang,en|string|max:255',
            'caste_mr' => 'nullable|required_if:lang,mr|string|max:255',
            'caste_hi' => 'nullable|required_if:lang,hi|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // $user = Auth::user();
        $userPermission = MasterPermission::where('user_id', $request->user_id)->first();
        
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->caste_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not an admin or caste master.'
            ], 403);
        }

        // if (!$userPermission || $userPermission->caste_master == 0) {
        //     return response()->json([
        //         'status' => 403,
        //         'message' => 'You are not an admin or caste master'
        //     ], 403);
        // }

        // Translation logic based on selected language
        $translatedEn = null;
        $translatedMr = null;
        $translatedHi = null;

        if ($request->lang == 'en' && $request->caste) {
            $translatedEn = $request->caste;
            $translatedMr = GoogleTranslate::trans($request->caste, 'mr', 'en');
            $translatedHi = GoogleTranslate::trans($request->caste, 'hi', 'en');
        } elseif ($request->lang == 'mr' && $request->caste_mr) {
            $translatedMr = $request->caste_mr;
            $translatedEn = GoogleTranslate::trans($request->caste_mr, 'en', 'mr');
            $translatedHi = GoogleTranslate::trans($request->caste_mr, 'hi', 'mr');
        } elseif ($request->lang == 'hi' && $request->caste_hi) {
            $translatedHi = $request->caste_hi;
            $translatedEn = GoogleTranslate::trans($request->caste_hi, 'en', 'hi');
            $translatedMr = GoogleTranslate::trans($request->caste_hi, 'mr', 'hi');
        }

        // Create a new address record
        $caste = Caste::create([
            'user_id' => $request->user_id,
            'caste' => $translatedEn,
            'caste_mr' => $translatedMr,
            'caste_hi' => $translatedHi,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Caste data created successfully',
            'caste' => $caste
        ], 200);


    }

    public function casteSearch(Request $request)
    {
        // Validate the input parameters
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'query' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $query = $request->input('query');
        $user = Auth::user();
        $userPermission = Permission::where('user_id',$user->id)->first();
        if($userPermission->caste_master == 0){
            $data['status'] = 200;
            $data['message'] = 'You are not admin or you are not caste master';
           return response()->json($data, 200);
        }
        else{
            if($request->lang == 'en'){
                $caste = Caste::where('caste', 'LIKE', '%' . $query . '%')
                ->get();
                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'Caste search results retrieved successfully',
                    'caste' => $caste,

                ], 200);
            }
        }

    }

    public function casteListAllMasters(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'user_id' => 'required|exists:users,id',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $caste = Caste::where('user_id',$request->user_id)->get();
        $user = Auth::user();
        // dd($user);
        $userPermission = MasterPermission::where('user_id',$user->id)->first();
        // dd($userPermission);
        
        
        // if($userPermission->caste_master == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin or you are not caste master';
        //   return response()->json($data, 200);
        // }
        
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->caste_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not an admin or caste master.'
            ], 403);
        }
        // elseif($user->is_admin == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin';
        //   return response()->json($data, 200);
        // }

        elseif($request->lang == 'en'){
                $caste =  $caste
                ->map(function ($casteGroup) {
                    return [
                        'id' => $casteGroup->id ?? null,
                        'caste' => $casteGroup->caste ?? null,
                    ];
                })->values();
                return response()->json([
                    'status' => 200,
                    'message' => 'Caste list created by caste master retrieved successfully in English',
                    'caste' => $caste,
                ], 200);
        }
        elseif($request->lang == 'mr'){
            $caste =  $caste
            ->map(function ($casteGroup) {
                return [
                    'id' => $casteGroup->id ?? null,
                    'caste' => $casteGroup->caste_mr ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'caste list created by caste master retrieved successfully in Marathi',
                'caste' => $caste,
            ], 200);
        }
        else{
            $caste =  $caste
            ->map(function ($casteGroup) {
                return [
                    'id' => $casteGroup->id ?? null,
                    'caste' => $casteGroup->caste_hi ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'caste list created by address master retrieved successfully in Hindi',
                'caste' => $caste,
            ], 200);
        }

    }

    public function positionCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'lang' => 'required|in:en,mr,hi',
            'position' => 'nullable|required_if:lang,en|string|max:255',
            'position_mr' => 'nullable|required_if:lang,mr|string|max:255',
            'position_hi' => 'nullable|required_if:lang,hi|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // $user = Auth::user();
        $userPermission = MasterPermission::where('user_id', $request->user_id)->first();
        
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->position_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not an admin or position master.'
            ], 403);
        }

        // if (!$userPermission || $userPermission->position_master == 0) {
        //     return response()->json([
        //         'status' => 403,
        //         'message' => 'You are not an admin or position master'
        //     ], 403);
        // }

        // Translation logic based on selected language
        $translatedEn = null;
        $translatedMr = null;
        $translatedHi = null;

        if ($request->lang == 'en' && $request->position) {
            $translatedEn = $request->position;
            $translatedMr = GoogleTranslate::trans($request->position, 'mr', 'en');
            $translatedHi = GoogleTranslate::trans($request->position, 'hi', 'en');
        } elseif ($request->lang == 'mr' && $request->position_mr) {
            $translatedMr = $request->position_mr;
            $translatedEn = GoogleTranslate::trans($request->position_mr, 'en', 'mr');
            $translatedHi = GoogleTranslate::trans($request->position_mr, 'hi', 'mr');
        } elseif ($request->lang == 'hi' && $request->position_hi) {
            $translatedHi = $request->position_hi;
            $translatedEn = GoogleTranslate::trans($request->position_hi, 'en', 'hi');
            $translatedMr = GoogleTranslate::trans($request->position_hi, 'mr', 'hi');
        }

        // Create a new address record
        $position = Profession::create([
            'user_id' => $request->user_id,
            'position' => $translatedEn,
            'position_mr' => $translatedMr,
            'position_hi' => $translatedHi,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'position data created successfully',
            'position' => $position
        ], 200);

    }

    public function positionSearch(Request $request)
    {
        // Validate the input parameters
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'query' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $query = $request->input('query');
        $user = Auth::user();
        if($user->is_admin == 0){
            $data['status'] = 200;
            $data['message'] = 'You are not admin';
           return response()->json($data, 200);
        }
        else{
            if($request->lang == 'en'){
                $position = position::where('position', 'LIKE', '%' . $query . '%')
                ->get();
                // Return response
                return response()->json([
                    'status' => 200,
                    'message' => 'position search results retrieved successfully',
                    'position' => $position,

                ], 200);
            }
        }
    }

    public function positionListAllMasters(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required|in:en,mr,hi',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $position = Profession::where('user_id',$request->user_id)->get();
        $user = Auth::user();
        // dd($user);
        $userPermission = MasterPermission::where('user_id',$user->id)->first();
        // dd($userPermission);
        
        // if($userPermission->position_master == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin or you are not position master';
        //   return response()->json($data, 200);
        // }
        
        if (!$userPermission || (!($userPermission->all_permission || $userPermission->position_master))) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not an admin or position master.'
            ], 403);
        }
        // elseif($user->is_admin == 0){
        //     $data['status'] = 200;
        //     $data['message'] = 'You are not admin';
        //   return response()->json($data, 200);
        // }

        elseif($request->lang == 'en'){
                $position =  $position
                ->map(function ($positionGroup) {
                    return [
                        'id' => $positionGroup->id ?? null,
                        'position' => $positionGroup->position ?? null,
                    ];
                })->values();
                return response()->json([
                    'status' => 200,
                    'message' => 'position list created by caste master retrieved successfully in English',
                    'position' => $position,
                ], 200);
        }
        elseif($request->lang == 'mr'){
            $position =  $position
            ->map(function ($positionGroup) {
                return [
                    'id' => $positionGroup->id ?? null,
                    'position' => $positionGroup->position_mr ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'position list created by caste master retrieved successfully in Marathi',
                'position' => $position,
            ], 200);
        }
        else{
            $position =  $position
            ->map(function ($positionGroup) {
                return [
                    'id' => $positionGroup->id ?? null,
                    'position' => $positionGroup->position_hi ?? null,
                ];
            })->values();
            return response()->json([
                'status' => 200,
                'message' => 'position list created by address master retrieved successfully in Hindi',
                'position' => $position,
            ], 200);
        }

    }

    public function masterPermission(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'society_master' => 'nullable|boolean',
            'caste_master' => 'nullable|boolean',
            'position_master' => 'nullable|boolean',
            'karyakarta_master' => 'nullable|boolean',
            'address_master' => 'nullable|boolean',
            'all_permission' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ], 400);
        }

        // Check if all_permission is set; if yes, set all fields to 1
        $allPermissions = $request->has('all_permission') && $request->all_permission == 1;
    
        // Set values based on all_permission flag
        $data = [
            'user_id' => $request->user_id,
            'all_permission' => $allPermissions,
            'society_master' => $allPermissions ? 1 : ($request->has('society_master') ? 1 : 0),
            'caste_master' => $allPermissions ? 1 : ($request->has('caste_master') ? 1 : 0),
            'position_master' => $allPermissions ? 1 : ($request->has('position_master') ? 1 : 0),
            'karyakarta_master' => $allPermissions ? 1 : ($request->has('karyakarta_master') ? 1 : 0),
            'address_master' => $allPermissions ? 1 : ($request->has('address_master') ? 1 : 0),
            'user_type' => 'appuser',
        ];

        // Check if the user's permissions exist
        $permission = MasterPermission::where('user_id', $request->user_id)->first();

        if ($permission) {
            // Update existing permissions
            $permission->update($data);

            return response()->json([
                'status' => 200,
                'message' => 'Master permissions updated successfully',
                'data' => $permission,
            ], 200);
        } else {
            // Create new permissions
            $newPermission = MasterPermission::create($data);

            return response()->json([
                'status' => 201,
                'message' => 'Master permissions created successfully',
                'data' => $newPermission,
            ], 201);
        }
    }

    public function societyMasterList(Request $request)
    {
        if (Auth::user()->is_admin != 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin.',
            ], 403);
        }
        $societyMasterList = MasterPermission::where('society_master',1)->with('users')->where('user_type','appuser')->get();

            return response()->json([
                'status' => 201,
                'message' => 'Society Master fetched successfully',
                'data' => $societyMasterList,
            ], 201);
    }

    public function addressMasterList(Request $request)
    {
        if (Auth::user()->is_admin != 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin.',
            ], 403);
        }
        $societyMasterList = MasterPermission::where('address_master',1)->with('users')->where('user_type','appuser')->get();

            return response()->json([
                'status' => 201,
                'message' => 'Address Master fetched successfully',
                'data' => $societyMasterList,
            ], 201);
    }

    public function KaryakartaMasterList(Request $request)
    {
        if (Auth::user()->is_admin != 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin.',
            ], 403);
        }
        $societyMasterList = MasterPermission::where('karyakarta_master',1)->with('users')->where('user_type','appuser')->get();

            return response()->json([
                'status' => 201,
                'message' => 'Karyakarta master fetched successfully',
                'data' => $societyMasterList,
            ], 201);
    }

    public function casteMasterList(Request $request)
    {
        if (Auth::user()->is_admin != 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin.',
            ], 403);
        }
        $societyMasterList = MasterPermission::where('caste_master',1)->with('users')->where('user_type','appuser')->get();

            return response()->json([
                'status' => 201,
                'message' => 'Caste master fetched successfully',
                'data' => $societyMasterList,
            ], 201);
    }

    public function positionMasterList(Request $request)
    {
        if (Auth::user()->is_admin != 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin.',
            ], 403);
        }
        $societyMasterList = MasterPermission::where('position_master',1)->with('users')->where('user_type','appuser')->get();

            return response()->json([
                'status' => 201,
                'message' => 'Position master fetched successfully',
                'data' => $societyMasterList,
            ], 201);
    }

    public function allPermissionUserList(Request $request)
    {
        if (Auth::user()->is_admin != 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You are not admin.',
            ], 403);
        }
        $societyMasterList = MasterPermission::where('position_master',1)->where('caste_master',1)->where('karyakarta_master',1)->where('address_master',1)->where('society_master',1)->with('users')->where('user_type','appuser')->get();

            return response()->json([
                'status' => 201,
                'message' => 'Users list with all permisions fetched successfully',
                'data' => $societyMasterList,
            ], 201);
    }





}
