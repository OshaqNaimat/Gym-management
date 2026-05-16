<?php
namespace App\Http\Controllers;

use App\Models\GymSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $settings = GymSetting::firstOrCreate([], [
            'gym_name'       => 'MYGYM',
            'email'          => 'admin@pumphouse.gym',
            'phone'          => '+92 300 0000000',
            'address'        => '123 Fitness Ave, Rawalpindi',
            'weekday_open'   => '05:00',
            'weekday_close'  => '22:00',
            'saturday_open'  => '07:00',
            'saturday_close' => '20:00',
            'sunday_open'    => '08:00',
            'sunday_close'   => '18:00',
        ]);

        return view('admin-setting', compact('settings'));
    }

    public function updateGym(Request $request)
    {
        $request->validate([
            'gym_name' => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'required|string',
            'address'  => 'required|string',
        ]);

        GymSetting::first()->update($request->only('gym_name', 'email', 'phone', 'address'));

        return back()->with('success', 'Gym details updated successfully!');
    }

    public function updateHours(Request $request)
    {
        $request->validate([
            'weekday_open'   => 'required',
            'weekday_close'  => 'required',
            'saturday_open'  => 'required',
            'saturday_close' => 'required',
            'sunday_open'    => 'required',
            'sunday_close'   => 'required',
        ]);

        GymSetting::first()->update($request->only(
            'weekday_open', 'weekday_close',
            'saturday_open', 'saturday_close',
            'sunday_open', 'sunday_close'
        ));

        return back()->with('success', 'Opening hours updated successfully!');
    }

   public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password'         => 'required|min:6|confirmed',
    ]);

    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    // ✅ Use User model directly instead of Auth::user()->update()
  User::where('id', Auth::id())->update([
    'password' => Hash::make($request->password),
]);

    return back()->with('success', 'Password changed successfully!');
}
}
