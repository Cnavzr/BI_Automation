<?php

namespace App\Http\Controllers;

use App\Helpers\SmsHelper;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use mPDF;
use Ramsey\Uuid\Type\Integer;
use Spatie\Permission\Models\Role;
use Spatie\SimpleExcel\SimpleExcelWriter;


class UserController extends Controller
{
    public function showUsersList()
    {
        $users = User::orderBy('id', 'desc')->get();
        $roles = Role::with('permissions')->get();
        return view('Users.list', compact('users' , 'roles'));
    }

    public function addUserPage()
    {
        $roles = Role::with('permissions')->get();
        return view('Users.add', compact('roles'));
    }

    public function addUser(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|min:3|max:32|string',
            'lastname' => 'required|min:3|max:32|string',
            'mobile' => 'required|numeric|digits:11|unique:users,mobile',
            'relation' => 'required|in:پدر,مادر,پدربزرگ,مادربزرگ,قیم',
            'role' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Role::where('name', $value)->exists()) {
                        $fail(" نقش {$attribute} معتبر نمی باشد.");
                    }
                },
            ],
        ], [
            'firstname.required' => 'وارد کردن نام کاربر اجباریست.',
            'firstname.min' => 'نام کاربر می بایست حداقل 3 کاراکتر داشته باشد.',
            'firstname.max' => 'نام کاربر می بایست حدکثر 32 کاراکتر داشته باشد.',
            'firstname.string' => 'نام کاربر فقط شامل حروف می باشد.',

            'lastname.required' => 'وارد کردن نام خانوادگی کاربر اجباریست.',
            'lastname.min' => 'نام خانوادگی کاربر می بایست حداقل 3 کاراکتر داشته باشد.',
            'lastname.max' => 'نام خانوادگی کاربر می بایست حدکثر 32 کاراکتر داشته باشد.',
            'lastname.string' => 'نام خانوادگی کاربر فقط شامل حروف می باشد.',

            'mobile.required' => 'وارد کردن شماره موبایل اجباریست.',
            'mobile.digits' => 'شماره موبایل می بایست 11 رقم باشد.',
            'mobile.numeric' => 'شماره موبایل فقط شامل اعداد می باشد.',
            'mobile.unique' => 'این شماره موبایل قبلا استفاده شده است.',

            'relation.required' => 'وارد کردن نسبت خانوادگی اجباریست.',
            'relation.in' => 'مقدار وارد شده معتبر نمی باشد.',

            'role.required' => 'وارد کردن نقش کاربر اجباریست.',
            'role.string' => 'نقش کاربر فقط شامل حروف می باشد.',

        ]);
        $randomPassword = random_int(10000000, 99999999);
        $hashedPassword = Hash::make($randomPassword);
        $user = User::create([
            'relation' => $request->relation,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'relation' => $request->relation,
            'mobile' => $request->mobile,
            'password' => $hashedPassword,
        ]);
        $user->assignRole($request->role);

        $message = "سلام $request->firstname عزیز! \n به پرتال فردوک خوش آمدید. \n رمز عبور شما: $randomPassword \n لغو11";
        SmsHelper::sendSms($user->mobile, $message);

        return redirect()->route('userList')->withSuccess('کاربر با موفقیت افزوده شد.');

    }

    public function editUserPage($id)
    {
        $user = User::find($id);
        $roles = Role::with('permissions')->get();
        $userRoles = $user->getRoleNames();
        return view('Users.edit', compact('user', 'roles','userRoles'));
    }

    public function editUserSubmit($id, Request $request)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'firstname' => 'required|min:3|max:32|string',
            'lastname' => 'required|min:3|max:32|string',
            'relation' => 'required|in:پدر,مادر,پدربزرگ,مادربزرگ,قیم',
            'status' => 'required|in:0,1',
            'role' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Role::where('name', $value)->exists()) {
                        $fail(" نقش {$attribute} معتبر نمی باشد.");
                    }
                },
            ],
        ], [
            'firstname.required' => 'وارد کردن نام کاربر اجباریست.',
            'firstname.min' => 'نام کاربر می بایست حداقل 3 کاراکتر داشته باشد.',
            'firstname.max' => 'نام کاربر می بایست حدکثر 32 کاراکتر داشته باشد.',
            'firstname.string' => 'نام کاربر فقط شامل حروف می باشد.',

            'lastname.required' => 'وارد کردن نام خانوادگی کاربر اجباریست.',
            'lastname.min' => 'نام خانوادگی کاربر می بایست حداقل 3 کاراکتر داشته باشد.',
            'lastname.max' => 'نام خانوادگی کاربر می بایست حدکثر 32 کاراکتر داشته باشد.',
            'lastname.string' => 'نام خانوادگی کاربر فقط شامل حروف می باشد.',

            'relation.required' => 'وارد کردن نسبت خانوادگی اجباریست.',
            'relation.in' => 'مقدار وارد شده معتبر نمی باشد.',

            'status.required' => 'وارد کردن وضعیت کاربر اجباریست.',
            'status.in' => 'مقدار وارد شده معتبر نمی باشد.',


            'role.required' => 'وارد کردن نقش کاربر اجباریست.',
            'role.string' => 'نقش کاربر فقط شامل حروف می باشد.',

        ]);
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'relation' => $request->relation,
            'status' => $request->status,
        ]);
        $user->syncRoles([]);
        $user->assignRole($request->role);
        return back()->withSuccess('اطلاعات با موفقیت بروزرسانی شد.');

    }

    public function profilePage()
    {
        $user = Auth::user();
        return view('Users.profile', compact('user'));
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'relation' => $request->relation,
        ]);

        return back()->withSuccess('اطلاعات با موفقیت بروزرسانی شد.');

    }

    public function exportUserCSV()
    {
        $users = User::all(); // دریافت همه کاربران

        $csvPath = storage_path('users.csv'); // مسیر ذخیره‌سازی فایل

        $writer = SimpleExcelWriter::create($csvPath)
            ->addHeader(['نام', 'نام خانوادگی', 'نسبت', 'شماره موبایل']); // اضافه کردن عنوان ستون‌ها

        foreach ($users as $user) {
            $writer->addRow([
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'relation' => $user->relation,
                'mobile' => $user->mobile,
            ]);
        }

        return response()->download($csvPath);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user != null) {
            $user->delete();
            Session::flash('success', 'کاربر با موفقیت حذف شد.');
        }else{
            Session::flash('error', 'کاربر یافت نشد.');
        }
        return redirect()->route('userList');

    }






}
