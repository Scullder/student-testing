<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
  public function action(Request $request)
  {
    auth()->logout();

    return redirect()->route('loginRender');
  }
}
