<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.addProfile');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'profile_photo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('add_project_validaiton_faild', 'validation faild');
        }

        $imageName = time() . '.' . $request->profile_photo->extension();
        $request->profile_photo->storeAs('public/profiles-img', $imageName);

        $userModel = User::find(Auth::user()->id);
        $userModel->name = $request->name;
        $userModel->email = $request->email;
        $userModel->profile_img = $imageName;
        $userModel->save();

        return redirect()->back()->with('success', 'Profile update successfull');
    }
}
