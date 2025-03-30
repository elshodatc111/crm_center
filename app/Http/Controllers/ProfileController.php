<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller{
    public function index(){
        $user = User::find(auth()->user()->id);
        return view('profile.index',compact('user'));
    }
    public function update(Request $request){
        $request->validate([
            'id'=>'required|integer|exists:users,id',
            'user_name' => 'required|string|max:255',
            'phone2' => 'required|string|max:16', 
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
        ]);
        $user = User::findOrFail($request->input('id'));
        $user->user_name = $request->input('user_name');
        $user->phone2 = $request->input('phone2');
        $user->address = $request->input('address');
        $user->birthday = $request->input('birthday');
        $user->save();
        return redirect()->back()->with('success', 'Profil yangilandi!');
    }
    public function changePassword(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'current_password' => 'required',  
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required',
        ]);
        $user = User::find($request->id);
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Joriy parol noto‘g‘ri']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Parol muvaffaqiyatli yangilandi! Iltimos, yangi parolingiz bilan tizimga kiring.');
    }
    
}
