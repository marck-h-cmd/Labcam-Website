<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:200',
            'career' => 'required|string|max:70',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/[A-Z]/|regex:/[a-z]/',
            'photo' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $rutaImagen = $photo->store('photos', 'public'); 
        }
        $data = $request->all();
        $data['photo'] = $rutaImagen; 
        $this->create($data);
        
        return redirect()->route('register-user')->with('success', 'Confirmación de registro exitoso,pronto el propietario le admitira.');

       
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




    public function edit_user()
    {
          $user = Auth::user(); 
          return view('administrador.general.edit-profile', compact('user'));
    }



    public function update_user(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:200',
            'career' => 'required|string|max:70',
            'password' => 'nullable|min:6|same:password_confirmation',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
       
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }
    
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'career' => $request->career,
        ]);

    
        // return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
        return redirect()->back()->with('success-user', 'Datos actualizado con éxito');
    
    }
    
    

public function update_photo(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($request->hasFile('photo')) {
        
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        
        $photoPath = $request->file('photo')->store('profile_photos', 'public');
        
       
        $user->update(['photo' => $photoPath]);
    }

    return redirect()->back()->with('success-photo', 'Perfil actualizado correctamente');
}


public function update_password(Request $request, $id)
{
    $user = User::findOrFail($id);


    $request->validate([
        'password' => 'required|string|min:8|confirmed', 
    ]);

    $user->update([
        'password' => bcrypt($request->input('password')), 
    ]);

    return redirect()->back()->with('success-password', 'Contraseña actualizada correctamente');
}



public function showUser(Request $request)
{
        $query = $request->input('search'); 

        $users = User::when($query, function ($queryBuilder) use ($query) {
             $queryBuilder->where('firstname', 'like', '%' . $query . '%')
                          ->orWhere('lastname', 'like', '%' . $query . '%')
                          ->orWhere('email', 'like', '%' . $query . '%');
        })
        ->where('is_approved', true)
        ->paginate(10);

         return view('administrador.general.managementusers.show', compact('users'));
}


public function store(Request $request)
{
    
    $request->validate([
        'firstname' => 'required|string|max:100',
        'lastname' => 'required|string|max:100',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:200',
        'career' => 'required|string|max:70',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|regex:/[A-Z]/|regex:/[a-z]/',
        'photo' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
    ]);

   
    $rutaImagen = null;
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $rutaImagen = $photo->store('photos', 'public'); 
    }

    
    $user = User::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'career' => $request->input('career'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'photo' => $rutaImagen,
    ]);

    $user->is_approved = true;
    $user->save();

   
    return redirect()->route('users')->with('success', 'Usuario creado exitosamente.');
}

public function edit($id)
{

    $users = User::findOrFail($id);
    return view('administrador.general.managementusers.edit', compact('users'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'firstname' => 'required|string|max:100',
        'lastname' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:200',
        'career' => 'required|string|max:70',
        'password' => 'nullable|min:6|same:password_confirmation',
        'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);


    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $user->photo = $path;
    }

    $user->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'career' => $request->career,
    ]);


    return redirect()->route('users')->with('success-update', 'Usuario actualizada con éxito');

}


public function destroy($id)
{
 
    $user = User::findOrFail($id);

    if ($user->photo && Storage::disk('public')->exists($user->photo)) {
        Storage::disk('public')->delete($user->photo);
    }

    $user->delete();

    return redirect()->route('users')->with('success-destroy', 'Usuario eliminado exitosamente.');
}


public function showPerson(Request $request)
{
        

    $person = User::where('is_approved', false)->paginate(10);

    return view('administrador.general.persons.person', compact('person'));
}


public function approveUser($id)
{
    $user = User::findOrFail($id);
    $user->is_approved = true;
    $user->save();

    return redirect()->route('person')->with('success-approve', 'Usuario aprobado correctamente.');
}

public function destroy_person($id)
{
    $user = User::findOrFail($id);

    
    if ($user->is_approved) {
        return back()->withErrors(['error' => 'No se puede eliminar un usuario aprobado.']);
    }

    if ($user->photo && Storage::disk('public')->exists($user->photo)) {
        Storage::disk('public')->delete($user->photo);
    }

    $user->delete();

    return redirect()->route('person')->with('success-destroy', 'Usuario eliminado exitosamente.');
}

}
