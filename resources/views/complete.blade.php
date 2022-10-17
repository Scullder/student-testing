@extends('layouts.clear_app')
@section('title', 'complete!')
@section('body')
  <div class="container-fluid d-flex justify-content-center h-100 pt-3">
      <div class="w-100">
          <div class="alert alert-success mb-2 w-75 mx-auto" role="alert">
            Test complete!<br>
            Your's score is <b>{{ $score }}/{{ $all }}</b>.
          </div>
      </div>
  </div>
@endsection