<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PoliticianController extends Controller
{
    public function create(){
        return view('admin.pages.politician.create');
    }

    public function register(Request $request){
        //dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|string|min:6',
            'image'  => 'required',
            'age'  => 'required',
            'gender'  => 'required',
            'party_name'  => 'required',
            'party_logo' => 'required',


        ]);
        $candidateImagePath = null;
        if ($request->hasFile('image')) {
            $candidateImage = $request->file('image');
            $candidateImageName = time() . '_' . $candidateImage->getClientOriginalName(); // Generate unique name
            $candidateImage->move(public_path('candidate_images'), $candidateImageName); // Move the image to the public folder
            $candidateImagePath = 'candidate_images/' . $candidateImageName; // Store the public path
        }
        $partyLogoImagePath = null;
        if ($request->hasFile('party_logo')) {
            $partyLogoImage = $request->file('party_logo');
            $partyLogoImageName = time() . '_' . $partyLogoImage->getClientOriginalName(); // Generate unique name
            $partyLogoImage->move(public_path('party_logo_images'), $partyLogoImageName); // Move the image to the public folder
            $partyLogoImagePath = 'party_logo_images/' . $partyLogoImageName; // Store the public path
        }
        // Create the Panchayat user and store it in the 'admin' table
        $politician = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'user_type' => 'politician',
            'age' => $request->age,
            'gender' => $request->gender,
            'party_name' => $request->party_name,
            'party_logo' => $request->party_logo,
            'image' =>    $candidateImagePath,
            'party_logo' => $partyLogoImagePath,
        ]);
        // dd($politician);

        return redirect()->route('admin.politician.list')->with('success', 'Politician registered successfully.');
    }
    public function list(){
        $politicians = Admin::where('user_type','politician')->get();
        return view('admin.pages.politician.list',compact('politicians'));
    }
}
