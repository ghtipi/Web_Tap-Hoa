<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{

    //Đăng ký
    public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:100',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => 'customer', // Không cho người dùng chọn
    ]);

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'message' => 'Đăng ký thành công!',
        'user' => $user,
        'token' => $token
    ]);
    }
    public function login(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'password' => 'required|string|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Email hoặc mật khẩu không đúng'], 401);
            }

            // Tạo token cho user
            $token = $user->createToken('YourAppName')->plainTextToken;

            return response()->json([
                'message' => 'Đăng nhập thành công!',
                'user' => $user,
                'token' => $token,
            ]);
    }
    public function logout(Request $request)
    {
        // Hủy token hiện tại
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Đăng xuất thành công!']);
    }
}
