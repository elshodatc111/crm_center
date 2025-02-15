<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Setting;

class LoginController extends Controller{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    protected function authenticated(Request $request, $user){
        if (!in_array($user->type, ['sAdmin', 'admin', 'meneger'])) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Sizga kirishga ruxsat berilmagan!',
            ]);
        }
        $Setting = Setting::first();
        if (in_array($user->type, ['admin', 'meneger']) && optional($Setting)->status !== 'true') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Tizim bloklangan, administrator bilan bog‘laning!',
            ]);
        }
        if ($user->status !== 'true') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Sizning loginingiz admin tomonidan bloklangan!',
            ]);
        }
    }
}
