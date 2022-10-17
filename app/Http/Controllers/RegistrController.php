<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegistrController extends Controller
{
    public function render()
    {
      return view('registr');
    }

    public function action(Request $request)
    {
      //dd($request->login);
      $this->validate($request, [
        'login' => 'required|max:30',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:4',
        'password_confirmation' => 'required|min:4',
      ]);

      $user = User::create([
                'login' => $request->login,
                'email' => $request->email,
                'password' => Hash::make($request->password)
              ]);

      auth()->attempt($request->only('email', 'password'));
      Storage::makeDirectory(auth()->user()->login);

      return redirect()->route('tests');
    }
}
