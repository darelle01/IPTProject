<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Container\Attributes\Log;
use Illuminate\Contracts\Encryption\DecryptException;

class LogOutBtnController extends Controller
{
    public function LogoutBtn(Request $request){

        $DecryptedUsername = Crypt::decrypt(session('EncryptUsername'));
        $user = AccountsModel::where('username', $DecryptedUsername)->first();
        $ActivityStatus = 'Offline';
        $user->ActivityStatus = $ActivityStatus;
        $user->save(); 
        Auth::logout();    

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget('laravel_session')); 
        Cookie::queue(Cookie::forget('XSRF-TOKEN'));
        return redirect()->route('Login');
    }
}
