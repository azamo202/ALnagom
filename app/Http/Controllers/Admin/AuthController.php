<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
     public function login(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // البحث عن المستخدم بواسطة البريد الإلكتروني
        $user = User::where('email', $request->email)->first();

        // التحقق من وجود المستخدم وصحة كلمة المرور وأنه أدمن
        if (! $user || ! Hash::check($request->password, $user->password) || $user->role !== 'admin') {
            throw ValidationException::withMessages([
                'email' => ['بيانات الدخول غير صحيحة أو ليس لديك صلاحية الأدمن.'],
            ]);
        }

        // إنشاء توكن جديد للجلسة
        $token = $user->createToken('admin_token')->plainTextToken;

        return response()->json([
            'message' => 'تم تسجيل دخول الأدمن بنجاح.',
            'user'    => $user,
            'token'   => $token,
        ], 200); // إضافة كود الحالة 200 صراحة
    }

    public function index()
    {
        // استرجاع جميع المستخدمين مع التقييد (يمكن إضافة pagination لاحقاً)
        $users = User::all();

        return response()->json([
            'message' => 'قائمة جميع المستخدمين',
            'users'   => $users,
        ], 200);
    }
}