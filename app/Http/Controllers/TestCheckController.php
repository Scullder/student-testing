<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Test;
use App\Models\Answer;
use Illuminate\Support\Facades\Storage;

class TestCheckController extends Controller
{
    public function render($teacher, $testId)
    {
      $test = Test::find($testId);
      $file = $test->user->login . '/' . $test->file;

      $xml = simplexml_load_file('storage/' . $file);
      $arrayFromXml = json_decode(json_encode($xml), true);

      return view('student-test', ['testFile' => $arrayFromXml,
                                   'testModel' => $test,
                                   'frontCount' => 1]);
    }

    public function check(Request $request)
    {
      $file = $request->testFile;
      $testFromFile = json_decode(json_encode(simplexml_load_file('storage/' . $file)), true);

      // Преобразование атрибутов тега <test> в массив их значений вида ['id' => 'correct']
      $collection = collect(array_column($testFromFile['test'], '@attributes'));
      $testAttributes = $collection->mapWithKeys(function($item, $key){
          return [$item['id'] => $item['correct']];
      })->toArray();

      $score = 0;
      foreach($request->answer as $id => $answer)
      {
        if(array_key_exists($id, $testAttributes) && $testAttributes[$id] == $answer) {
          $score++;
        }
      }

      $answer = new Answer;
      $answer->fio = $request->fio;
      $answer->score = $score;
      $answer->test_id = $request->testId;
      $answer->save();

      return view('complete', ['score' => $score, 'all' => count($testAttributes)]);
    }
}
