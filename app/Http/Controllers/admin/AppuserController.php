<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Caste;
use App\Models\Society;
use App\Models\Karyakarta;
use App\Models\Profession;
use App\Models\Address;
use App\Models\User;

class AppuserController extends Controller
{
    public function appUserList()
    {
        $appUsers = User::orderby('id', 'desc')->where('user_type', 'appuser')->get();
        return view('admin.pages.app_user.app_user_list', compact('appUsers'));
    }

    public function appUserPermissionAdd($id)
    {
        // dd($id);
        $appUser = User::where('id', $id)->where('user_type', 'appuser')->with('userPermission')->first();
        // dd($appUser->id);
        return view('admin.pages.app_user.app_user_permission', compact('appUser'));
    }
    public function appUserPermissionStore(Request $request, $id)
    {
        $request->validate([
            'bluetooth_access' => 'nullable',
            'excelsheet_download' => 'nullable',
            'pdf_download' => 'nullable',
            'image_download' => 'nullable',
            'call_access' => 'nullable',
            'survey_import_from_server' => 'nullable',
            'voter_slip' => 'nullable',
        ]);

        $check = Permission::where('user_id', $id)->where('user_type', 'appuser')->first();

        // Assign the values, default to 0 if not provided
        $permissionData = [
            'bluetooth_access' => $request->bluetooth_access ?? 0,
            'excelsheet_download' => $request->excelsheet_download ?? 0,
            'pdf_download' => $request->pdf_download ?? 0,
            'image_download' => $request->image_download ?? 0,
            'call_access' => $request->call_access ?? 0,
            'survey_import_from_server' => $request->survey_import_from_server ?? 0,
            'voter_slip' => $request->voter_slip ?? 0,
        ];

        if ($check) {
            // Update existing permission
            $check->update($permissionData);
            return redirect()->route('admin.app.user.list',)
                             ->with('success', 'App user permission updated successfully.');
        } else {
            // Create new permission
            Permission::create([
                'user_id' => $id,
                'user_type' => 'appuser',
                'bluetooth_access' => $permissionData['bluetooth_access'],
                'excelsheet_download' => $permissionData['excelsheet_download'],
                'pdf_download' => $permissionData['pdf_download'],
                'image_download' => $permissionData['image_download'],
                'call_access' => $permissionData['call_access'],
                'survey_import_from_server' => $permissionData['survey_import_from_server'],
                'voter_slip' => $permissionData['voter_slip'],
            ]);

            return redirect()->route('admin.app.user.list', $id)
                             ->with('success', 'App user permission created successfully.');
        }
    }

    public function toggleAdmin($id)
    {
        $appUser = User::where('id', $id)->where('user_type', 'appuser')->first();
        // dd($appUser);
        if (!$appUser) {
            return response()->json(['success' => false, 'message' => 'User not found!']);
        }

        // Toggle the 'is_admin' field
        $appUser->is_admin = !$appUser->is_admin;
        $appUser->save();
        $appUserPermission = Permission::where('user_id',$id)->first();
        $appUserPermission->bluetooth_access = 1;
        $appUserPermission->excelsheet_download = 1;
        $appUserPermission->call_access = 1;
        $appUserPermission->pdf_download = 1;
        $appUserPermission->image_download = 1;
        $appUserPermission->survey_import_from_server = 1;
        $appUserPermission->voter_slip = 1;

        $appUserPermission->save();
        return response()->json([
            'success' => true,
            'is_admin' => $appUser->is_admin,
            'message' => 'Admin status updated successfully!',
        ]);
    }

    public function societyMasterSocietyList(){
        $societies = Society::with('user')->get();
        return view('admin.pages.app_user.society_list', compact('societies'));
    }
    public function addressMasterAddressList(){
        $addresses = Address::with('user')->get();
        return view('admin.pages.app_user.address_list', compact('addresses'));
    }
    public function karyakartaMasterKaryakartaList(){
        $karyakartas = Karyakarta::with('user')->get();
        return view('admin.pages.app_user.karyakarta_list', compact('karyakartas'));
    }
    public function casteMasterCasteList(){
        $castes = Caste::with('user')->get();
        return view('admin.pages.app_user.caste_list', compact('castes'));
    }
    public function positionMasterPositionList(){
        $positions = Profession::with('user')->get();
        return view('admin.pages.app_user.position_list', compact('positions'));
    }
}
