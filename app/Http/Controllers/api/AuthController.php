<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    public function login(Request $request){        
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        $user = User::select(['id', 'user_name', 'type', 'email', 'password'])->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ["Login yoki parol xato"],
            ]);
        }
        $user->tokens()->delete();
        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'Tizimga muvaffaqiyatli kirdingiz',
            'data' => [
                'id' => $user->id,
                'type' => $user->type,
                'name'     => $user->user_name,
                'email'    => $user->email,
                'token'    => $token
            ]
        ], 200);
    }

    public function logout(Request $request){
        try {
            $request->user()->tokens()->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tizimdan muvaffaqiyatli chiqdingiz.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Xatolik yuz berdi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function profile(){
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Foydalanuvchi topilmadi.'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'id'         => $user->id,
                'type'       => $user->type,
                'name'       => $user->user_name,
                'email'      => $user->email,
                'balans' => $user->balans,
                'created_at' => $user->created_at->format('d.m.Y'),
            ]
        ], 200);
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:8|confirmed|different:current_password',
        ], [
            'new_password.different' => 'Yangi parol eskisidan farq qilishi kerak!',
            'new_password.confirmed' => 'Yangi parol tasdig‘i mos kelmadi.',
        ]);
        $user = $request->user();
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Amaldagi parol noto‘g‘ri kiritildi.'],
            ]);
        }
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);
        $user->tokens()->where('id', '!=', $user->currentAccessToken()->id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Parol muvaffaqiyatli yangilandi!'
        ], 200);
    }

    public function changeEmail(Request $request){
        $request->validate([
            'current_email' => 'required|email',
            'new_email'     => 'required|email|unique:users,email',
            'password'      => 'required|string',
        ]);
        $user = $request->user();
        if ($user->email !== $request->current_email) {
            throw ValidationException::withMessages([
                'current_email' => ['Joriy email noto\'g\'ri.'],
            ]);
        }
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Parol noto\'g\'ri.'],
            ]);
        }
        $user->update([
            'email' => $request->new_email
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Email muvaffaqiyatli yangilandi!'
        ], 200);
    }
    
}
