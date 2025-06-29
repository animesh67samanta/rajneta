<?php

namespace App\Http\Controllers\politician;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function create()
    {
        return view('politician.pages.staff.create');
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable',
            'surname' => 'required|string|max:255',
            'image' => 'nullable',
            'gender' => 'required',
            'age' => 'required',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
            'bluetooth_access' => 'required',
            'excelsheet_download' => 'required',
            'pdf_download' => 'required',
            'image_download' => 'required',
            'call_access' => 'required',
            'staff_type' => 'required',
        ]);

        $staffImagePath = null;
        if ($request->hasFile('image')) {
            $staffImage = $request->file('image');
            $staffImageName = time() . '_' . $staffImage->getClientOriginalName();
            $staffImage->move(public_path('voter_images'), $staffImageName);
            $staffImagePath = 'voter_images/' . $staffImageName;
        }
        // Create the Panchayat user and store it in the 'admin' table
        $staff = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'surname' => $request->surname,
            'politician_id' => Auth::guard('admin')->user()->id,
            'user_type' => 'staff',
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'age' => $request->age,
            'image' => $staffImagePath,
            'staff_type' => $request->staff_type
        ]);
        $permission = Permission::create([
            'politician_id' => Auth::guard('admin')->user()->id,
            'user_id' => $staff->id,
            'user_type' => 'staff',
            'bluetooth_access' => $request->bluetooth_access,
            'excelsheet_download' => $request->excelsheet_download,
            'pdf_download' => $request->pdf_download,
            'image_download' => $request->image_download,
            'call_access' => $request->call_access,
        ]);
        return redirect()->route('politician.staff.list')->with('success', 'Staff registered successfully.');
    }
    public function list()
    {
        $staffs = User::orderby('id', 'desc')->where('user_type', 'staff')->where('politician_id', Auth::guard('admin')->user()->id)->get();
        return view('politician.pages.staff.list', compact('staffs'));
    }
    // public function appUserList()
    // {
    //     $appUsers = User::orderby('id', 'desc')->where('user_type', 'appuser')->get();
    //     return view('politician.pages.staff.app_user_list', compact('appUsers'));
    // }

    public function edit($id)
    {

        $staff = User::findOrFail($id); // Get the staff member by ID
        $permissions = Permission::where('user_id', $id)->first(); // Get the staff member's permissions

        return view('politician.pages.staff.edit', compact('staff', 'permissions'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable',
            'surname' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Validation for image file
            'gender' => 'required',
            'age' => 'required',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
            'bluetooth_access' => 'required',
            'excelsheet_download' => 'required',
            'pdf_download' => 'required',
            'image_download' => 'required',
            'call_access' => 'required',
            'staff_type' => 'required',
        ]);

        $staff = User::where('id', $id)->where('politician_id', Auth::guard('admin')->user()->id)->first(); // Find staff member by ID

        // Update staff image if provided
        if ($request->hasFile('image')) {
            $staffImage = $request->file('image');
            $staffImageName = time() . '_' . $staffImage->getClientOriginalName();
            $staffImage->move(public_path('voter_images'), $staffImageName);
            $staff->image = 'voter_images/' . $staffImageName;
        }

        // Update staff details
        $staff->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'age' => $request->age,
            'staff_type' => $request->staff_type
        ]);

        // Update staff permissions
        $permissions = Permission::where('user_id', $id)->where('politician_id', Auth::guard('admin')->user()->id)->first();
        $permissions->update([
            'bluetooth_access' => $request->bluetooth_access,
            'excelsheet_download' => $request->excelsheet_download,
            'pdf_download' => $request->pdf_download,
            'image_download' => $request->image_download,
            'call_access' => $request->call_access,
        ]);

        return redirect()->route('politician.staff.list')->with('success', 'Staff updated successfully.');
    }
    public function delete($id)
    {
        $staff = User::where('id', $id)->where('politician_id', Auth::guard('admin')->user()->id)->first();
        $staff->delete();
        return redirect()->route('politician.staff.list')->with('success', 'Staff deleted successfully.');
    }


    }

