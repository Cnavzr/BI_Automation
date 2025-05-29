<?php

namespace App\Http\Controllers;

use App\Helpers\SmsHelper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginPage(){
        if(Auth::check()){
            return redirect(route('dashboard'));
        }
        return view('Auth.login');
    }
    public function verifyPage(){
        if(Auth::check()){
            return redirect(route('dashboard'));
        }
        return view('Auth.verify');
    }
    public function vorodPage(){
        if(Auth::check()){
            return redirect(route('dashboard'));
        }
        return view('Auth.vorod');
    }
    public function verifyVorodPage(){
        if(Auth::check()){
            return redirect(route('dashboard'));
        }
        return view('Auth.verify-otp');
    }

    public function sendCode(Request $request)
    {
        $validatedData = $request->validate([
            'mobile' => 'required|digits:11|regex:/^09[0-9]{9}$/',
        ], [
            'mobile.required' => 'وارد کردن شماره موبایل اجباری است.',
            'mobile.digits' => 'شماره موبایل می بایست 11 رقم باشد.',
            'mobile.regex' => 'لطفا فقط اعداد انگلیسی وارد کنید.',
        ]);
        $mobile = $request->mobile;
        $verification_code = rand(100000, 999999); // تولید کد ۶ رقمی
        $expires_at = now()->addMinutes(5); // انقضای کد ۵ دقیقه بعد

        // بررسی وجود کاربر
        $user = User::where('mobile', $mobile)->first();

        if (!$user) {
            // اگر کاربر وجود نداشت، ثبت‌نام خودکار انجام شود
            $user = User::create([
                'mobile' => $mobile,
                'password' => Hash::make('defaultPassword123'), // مقدار پیش‌فرض
                'status' => 1, // فعال کردن کاربر
            ]);
            $user->assignRole('member');
        }
        $user->update([
            'verification_code' => $verification_code,
            'verification_expires_at' => $expires_at,
        ]);

        $message = "کد تأیید شما: $verification_code \nلغو۱۱";
        SmsHelper::sendSms($user->mobile, $message);

        return redirect()->route('verify')->with('mobile', $request->mobile);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'mobile' => 'required|exists:users,mobile',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        // بررسی اعتبار کد
        if (!$user->verification_code || $user->verification_code != $request->otp) {
            return response()->json(['message' => 'کد وارد شده اشتباه است.'], 422);
        }

        if (Carbon::now()->gt($user->verification_expires_at)) {
            return response()->json(['message' => 'کد منقضی شده است.'], 422);
        }

        // کد درست است → ورود کاربر
        $user->verification_code = null;
        $user->verification_expires_at = null;
        $user->save();

        Auth::login($user);
        return redirect()->intended('dashboard');
    }

    public function sendVorodCode(Request $request)
    {
        $validatedData = $request->validate([
            'mobile' => 'required|digits:11|regex:/^09[0-9]{9}$/',
        ], [
            'mobile.required' => 'وارد کردن شماره موبایل اجباری است.',
            'mobile.digits' => 'شماره موبایل می بایست 11 رقم باشد.',
            'mobile.regex' => 'لطفا فقط اعداد انگلیسی وارد کنید.',
        ]);
        $mobile = $request->mobile;
        $user = User::where('mobile', $mobile)->first();

        if (!$user) {
            return back()->withErrors(['mobile' => 'این شماره در سیستم ثبت نشده است.']);
        }


        $verification_code = rand(100000, 999999); // تولید کد ۶ رقمی
        $expires_at = now()->addMinutes(5); // انقضای کد ۵ دقیقه بعد

        $user->update([
            'verification_code' => $verification_code,
            'verification_expires_at' => $expires_at,
        ]);

        $message = "کد تأیید شما: $verification_code \nلغو۱۱";
        SmsHelper::sendSms($user->mobile, $message);

        return redirect()->route('verify')->with('mobile', $request->mobile);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
