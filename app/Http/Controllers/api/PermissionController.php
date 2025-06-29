<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Schema;


class PermissionController extends Controller
{
    public function userPermissions(){
        $user = Auth::user();
        $permissions = Permission::where('user_id', $user->id)->get();
        $data['status'] = 200;
        $data['message'] = 'User Permissions';
        $data['permission'] =  $permissions ;
        return response()->json($data, 200);

    }

    public function appUserList(){
            if (Auth::user()->is_admin != 1) {
                return response()->json([
                    'status' => 403,
                    'message' => 'You are not admin.',
                ], 403);
            }
            $appUsers = User::where('user_type', 'appuser')->with('masterPermission')->get();
            $data['status'] = 200;
            $data['message'] = 'App User list retrieved successfully';
            $data['appusers'] =  $appUsers ;
            return response()->json($data, 200);
    }

    // public function userMasterData(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'lang' => 'required|in:en,mr,hi',
    //         'staff_type' => 'required|in:Admin,Society Master,Address Master,Karya Karta Master,Caste Master,Position Master',


    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 400);
    //     }

    //     $staffs = User::where('politician_id', 8)->where('staff_type', $request->staff_type)->where('user_type', 'staff')->get();
    //     $data['status'] = 200;
    //     $data['message'] = 'Staff data fetched successfully';
    //     $data['permission'] = $staffs;
    //     return response()->json($data, 200);


    // }

    public function giveUserPermissions(Request $request)
{
    $validator = Validator::make($request->all(), [
        'user_id' => [
            'required',
            Rule::exists('users', 'id'), // Ensure user_id exists in the users table
        ],
        'is_admin' => 'nullable|boolean',
    ])->after(function ($validator) use ($request) {
        if (!$request->is_admin) {
            $rules = [
                'bluetooth_access' => 'required_without:is_admin|nullable',
                'excelsheet_download' => 'required_without:is_admin|nullable',
                'call_access' => 'required_without:is_admin|nullable',
                'pdf_download' => 'required_without:is_admin|nullable',
                'image_download' => 'required_without:is_admin|nullable',
                'survey_import_from_server' => 'required_without:is_admin|nullable',
                'voter_slip' => 'required_without:is_admin|nullable',
                'society_master' => 'required_without:is_admin|nullable',
                'caste_master' => 'required_without:is_admin|nullable',
                'profession_master' => 'required_without:is_admin|nullable',
                'karyakarta_master' => 'required_without:is_admin|nullable',
                'address_master' => 'required_without:is_admin|nullable',
            ];
            $subValidator = Validator::make($request->all(), $rules);

            if ($subValidator->fails()) {
                $validator->errors()->merge($subValidator->errors());
            }
        }
    });

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    if (!User::where('id', $request->user_id)->exists()) {
        return response()->json(['error' => ['user_id' => 'The selected user_id does not exist in the permissions table.']], 400);
    }

    if ($request->is_admin == 1) {
        $permissionData = [
            'bluetooth_access' => 1,
            'excelsheet_download' => 1,
            'pdf_download' => 1,
            'image_download' => 1,
            'call_access' => 1,
            'survey_import_from_server' => 1,
            'voter_slip' => 1,
            'society_master' => 1,
            'caste_master' => 1,
            'profession_master' => 1,
            'karyakarta_master' => 1,
            'address_master' => 1,
        ];

        $check = Permission::where('user_id', $request->user_id)->where('user_type', 'appuser')->first();

        if ($check) {
            // Update existing permission
            $user = User::where('id', $request->user_id)->first();
            $user->is_admin = 1;
            $user->save();
            $check->update($permissionData);

            return response()->json([
                'status' => 200,
                'message' => 'User permissions updated successfully',
                'permission' => $permissionData,
            ], 200);
        } else {
            // Create new permission
            $user = User::where('id', $request->user_id)->first();
            $user->is_admin = 1;
            $user->save();
            Permission::create(array_merge([
                'user_id' => $request->user_id,
                'user_type' => 'appuser',
            ], $permissionData));

            return response()->json([
                'status' => 200,
                'message' => 'User permissions created successfully',
                'permission' => $permissionData,
            ], 200);
        }
    } else {
        $permissionData = [
            'bluetooth_access' => $request->bluetooth_access,
            'excelsheet_download' => $request->excelsheet_download,
            'pdf_download' => $request->pdf_download,
            'image_download' => $request->image_download,
            'call_access' => $request->call_access,
            'survey_import_from_server' => $request->survey_import_from_server,
            'voter_slip' => $request->voter_slip,
            'society_master' =>$request->society_master,
            'caste_master' => $request->caste_master,
            'profession_master' => $request->profession_master,
            'karyakarta_master' => $request->karyakarta_master,
            'address_master' => $request->address_master,
        ];

        $check = Permission::where('user_id', $request->user_id)->where('user_type', 'appuser')->first();

        if ($check) {
            // Update existing permission
            $user = User::where('id', $request->user_id)->first();
            $user->is_admin = 0;
            $user->save();
            $check->update($permissionData);

            return response()->json([
                'status' => 200,
                'message' => 'User permissions updated successfully',
                'permission' => $permissionData,
            ], 200);
        } else {
            // Create new permission
            $permissionData = array_merge($permissionData, [
                'bluetooth_access' => $request->bluetooth_access ?? 0,
                'excelsheet_download' => $request->excelsheet_download ?? 0,
                'pdf_download' => $request->pdf_download ?? 0,
                'image_download' => $request->image_download ?? 0,
                'call_access' => $request->call_access ?? 0,
                'survey_import_from_server' => $request->survey_import_from_server ?? 0,
                'voter_slip' => $request->voter_slip ?? 0,
                'society_master' => $request->society_master ?? 0,
                'caste_master' => $request->caste_master ?? 0,
                'profession_master' => $request->profession_master ?? 0,
                'karyakarta_master' => $request->karyakarta_master ?? 0,
                'address_master' => $request->address_master ?? 0,
            ]);

            Permission::create(array_merge([
                'user_id' => $request->user_id,
                'user_type' => 'appuser',
            ], $permissionData));

            return response()->json([
                'status' => 200,
                'message' => 'User permissions created successfully',
                'permission' => $permissionData,
            ], 200);
        }
    }
}

    public function setUserPermission(Request $request)
    {
        $validPermissions = [
            'bluetooth_access',
            'excelsheet_download',
            'call_access',
            'pdf_download',
            'image_download',
            'survey_import_from_server',
            'voter_slip',
            'society_master',
            'caste_master',
            'profession_master',
            'karyakarta_master',
            'address_master',
            'activated',
        ];
    
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'permission' => ['required', 'string', Rule::in($validPermissions)],
            'value' => 'required|boolean',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        } 
        
        $validated = $validator->validated();

        // Get user with user_type
        $user = User::find($validated['user_id']);
    
        // Get or create permission record for the user
        $permission = Permission::firstOrCreate(
            ['user_id' => $user->id],
            ['user_type' => $user->user_type]
        );
    
        // Update the relevant permission column
        $permission->{$validated['permission']} = $validated['value'];
        $permission->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Permission updated successfully.',
            'data' => [
                'user_id' => $validated['user_id'],
                'permission' => $validated['permission'],
                'value' => $validated['value'],
            ]
        ]);
        
    }
    
    public function getUserPermission(Request $request)
    {
        
       // Validate input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'permission' => ['required', 'string'],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
    
        $validated = $validator->validated();
        
         // Check if permission column exists in the permissions table
        if (!Schema::hasColumn('permissions', $validated['permission'])) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid permission key: permission does not exist in the system.',
            ], 400);
        }
    
        // Find permission record for user
        $permission = Permission::where('user_id', $validated['user_id'])->first();
    
        if (!$permission) {
            return response()->json([
                'success' => false,
                'message' => 'Permission record not found for this user.'
            ], 404);
        }
    
        // Return the value of the requested permission
        return response()->json([
            'success' => true,
            'data' => [
                'user_id' => $validated['user_id'],
                'permission' => $validated['permission'],
                'value' => (bool) $permission->{$validated['permission']},
            ]
        ]);
        
    }

}
