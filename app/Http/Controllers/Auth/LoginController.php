<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id == 1) { // Mahasiswa
            return redirect()->route('dashboard');
        } elseif ($user->role_id == 2) { // Prodi
            return redirect()->route('dashboard-prodi');
        } elseif ($user->role_id == 3) { // Pengurus
            return redirect()->route('dashboard-pengurus');
        } else {
            // Jika role tidak dikenali, tambahkan logika redirect sesuai kebutuhan             
            return redirect('/');
        }
    }
}
