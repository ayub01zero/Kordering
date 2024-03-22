<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('frontend.userfront.userprofile', compact('user'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'sometimes|required',
            'address' => 'sometimes|required',
            'city' => 'sometimes|required',
            'Date_of_Birth' => 'sometimes|required',
        ]);
        

        $user = auth()->user();
        $user->update($request->all());
        NotificationHelper::show('profile update successfully','success');

        return redirect()->back();;
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
