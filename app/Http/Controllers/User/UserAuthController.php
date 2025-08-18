<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class UserAuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // تحديد دور المستخدم مع ضبط القيمة الافتراضية
        $role = $request->input('role', 'user');
        
        // التأكد من أن الدور إما user أو admin فقط
        $validatedRole = in_array($role, ['user', 'admin']) ? $role : 'user';

        // إنشاء المستخدم الجديد
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => $validatedRole,
        ]);

        // إنشاء توكن وصول للمستخدم
        $token = $user->createToken($validatedRole . '_token')->plainTextToken;

        return response()->json([
            'message' => 'تم إنشاء الحساب بنجاح.',
            'user'    => $user->makeHidden('password'), // إخفاء كلمة المرور في الإجابة
            'token'   => $token,
        ], 201); // كود الحالة 201 للإنشاء الناجح
    }

    public function login(LoginRequest $request)
    {
        // البحث عن المستخدم بواسطة البريد الإلكتروني
        $user = User::where('email', $request->email)->first();

        // التحقق من وجود المستخدم وصحة كلمة المرور وأنه من نوع user
        if (!$user || !Hash::check($request->password, $user->password) || $user->role !== 'user') {
            throw ValidationException::withMessages([
                'email' => ['بيانات الدخول غير صحيحة أو لا تملك صلاحية المستخدم.'],
            ]);
        }

        // إنشاء توكن جديد للجلسة
        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'تم تسجيل الدخول بنجاح.',
            'user'    => $user->makeHidden('password'), // إخفاء كلمة المرور في الإجابة
            'token'   => $token,
        ], 200);
    }
}