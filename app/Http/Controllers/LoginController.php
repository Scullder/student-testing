<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function render()
  {
    return view('login');
  }

  public function action(Request $request)
  {
    $this->validate($request, [
      'login' => 'required|max:30',
      'password' => 'required|min:4',
    ]);

    if(!auth()->attempt($request->only('login', 'password')))
    {
        return back()->with('loginError', 'The password or login is not correct!');
    }

    return redirect()->route('tests');
  }
}
