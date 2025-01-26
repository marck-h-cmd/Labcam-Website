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
            'photo' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $rutaImagen = $photo->store('photos', 'public'); // Guardar imagen en el directorio public
        }
        $data = $request->all();
        $data['photo'] = $rutaImagen; // La foto solo se asigna si se sube una imagen
        $this->create($data);
        
       
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
        'password' => Hash::make($data['password']),
        'photo' => $data['photo'],
      ]);
    }

    public function edit()
    {
          $user = Auth::user(); 
          return view('administrador.general.edit-profile', compact('user'));
    }



    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'career' => 'required|string|max:255',
        'password' => 'nullable|min:6|same:password_confirmation',
        'photo' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
    ]);

 
      // Actualizar la imagen si se sube una nueva
    if ($request->hasFile('photo')) {
        $imagenPath = $request->file('photo')->store('photos', 'public');
        $user->photo = $imagenPath;
    }

    $user->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'career' => $request->career,
        'password' => $request->password ? Hash::make($request->password) : $user->password,
    ]);

    // return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    return redirect()->back()->with('success', 'Evento actualizada con éxito');

}

}
