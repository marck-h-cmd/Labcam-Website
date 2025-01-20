<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('usuario.auth.login');
    }

    public function registration()
    {
        return view('usuario.auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'career' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/[A-Z]/|regex:/[a-z]/',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect("plantilla")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'phone' => $data['phone'],
        'address' => $data['address'],
        'career' => $data['career'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
}
