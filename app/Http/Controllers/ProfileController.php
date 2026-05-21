<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function info()
    {
        return view('profile.info');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric',
            'currentPassword' => 'nullable|required_with:newPassword',
            'newPassword' => 'nullable|different:currentPassword',
        ]);

        if ($validated['newPassword'] && !Hash::check($validated['currentPassword'], auth()->user()->password)) {
            return back()->withInput()->withErrors(['currentPassword' => 'رمز فعلی اشتباه است.']);
        }

        $updateFields = collect(['firstname' => $validated['firstname'], 'lastname' => $validated['lastname'],
            'phone' => $validated['phone'], 'password' => $validated['newPassword']])->whereNotNull()->toArray();

        auth()->user()->update($updateFields);

        return back()->->with(['success' => 'اطلاعات با موفقیت بروزرسانی شد.']);
    }
}
