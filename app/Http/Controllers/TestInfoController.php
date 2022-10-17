<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestInfoController extends Controller
{
  public function render($id)
  {
    $test = Test::find($id);

    return view('test-info', ['test' => $test, 'results' => $test->answers()->paginate(15)]);
  }
}
