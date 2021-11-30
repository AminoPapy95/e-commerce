<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();

        $notifications = array(
            'message' => 'User logout SuccessFuly !',
            'alert-type' => 'success'
        );


        return redirect()->route('login')->with($notifications);
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore (Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notifications = array(
            'message' => 'User Profile Updated SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notifications);
    }
}