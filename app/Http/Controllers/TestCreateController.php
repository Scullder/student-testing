<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Test;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;


class TestCreateController extends Controller
{
    public function render()
    {
      return view('forms.create');
    }

    public function create(Request $request)
    {
      Validator::validate($request->all(), [
          'title' => 'required',
          'file' => ['required', File::types(['xml'])]
      ]);


      $user = auth()->user();
      $file = $request->file('file');

      $test = new Test;
      $test->name = $request->title;
      $test->file = $file->getClientOriginalName();
      $test->size = $request->size;
      $test->user()->associate($user);
      $test->save();

      $file->storeAs($user->login, $file->getClientOriginalName());

      return redirect('tests')->with('status', 'Test created successfuly.');
    }
}
