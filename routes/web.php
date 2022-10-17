<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCheckController;
use App\Http\Controllers\TestCreateController;
use App\Http\Controllers\TestInfoController;
use App\Http\Controllers\RegistrController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


Route::middleware([Authenticate::class])->group(function(){
  Route::get('logout', [LogoutController::class, 'action'])->name('logoutAction');
  Route::get('create', [TestCreateController::class, 'render'])->name('createRender');
  Route::post('create/action', [TestCreateController::class, 'create'])->name('createAction');
  Route::get('tests', function(){
    return view('tests', ['tests' => auth()->user()->tests()->paginate(15), 'frontCount' => 1]);
  })->name('tests');
  Route::get('test/{id}/info', [TestInfoController::class, 'render'])->name('info');
});


Route::middleware([RedirectIfAuthenticated::class])->group(function(){
  //Log-Reg
  Route::get('registr', [RegistrController::class, 'render'])->name('registrRender');
  Route::post('registr/action', [RegistrController::class, 'action'])->name('registrAction');
  Route::get('/', [LoginController::class, 'render'])->name('loginRender');
  Route::post('login/action', [LoginController::class, 'action'])->name('loginAction');
});

Route::get('test/{teacher}/{testId}', [TestCheckController::class, 'render'])->name('answerRender');
Route::post('answer/action', [TestCheckController::class, 'check'])->name('answerAction');

