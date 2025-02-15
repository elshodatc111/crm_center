<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    }
}
