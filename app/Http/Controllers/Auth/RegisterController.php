<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/success';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $role = Role::where('nama', 'mahasiswa')->first(); // Mengambil role "mahasiswa" dari database

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_role' => $role->id_role, // Menggunakan ID role "mahasiswa"
        ]);
    }

        /**
     * @param Request $request
     * 
     * @return [type]
     */
    public function check(Request $request)
    {
        return User::where('email', $request->email)->count() > 0 ? 'Unavailable' :"Available" ;
    }

    
}
