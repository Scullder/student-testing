@extends('layouts.app')
@section('title', 'Your\'s tests')
@section('body')

@if(!isset($tests) || (isset($tests) && count($tests) == 0))
  <div class="container-fluid d-flex justify-content-center h-100">
    <div class="w-50 mt-4">
      <div class="w-100 mx-auto">
        <!-- <img src="img/miss.webp" class="w-100 shadow-lg"> -->
          <div class="alert alert-danger" role="alert">
            You don't have any test, yet!<br>
            You may create the new test
            <a href="{{ route('createRender') }}" class="link-danger">HERE</a>
          </div>
      </div>
    </div>
  </div>
@else
  <div class="container-fluid d-flex justify-content-center min-vh-100">
    <div class="w-75 bg-white shadow-lg border rounded py-4 px-5 my-3">
      <div class="text-center mb-3">
        <h5><b>Tests</b></h5>
      </div>

      @if(session('status'))
        <div class="alert alert-success mb-2 w-75 mx-auto" role="alert">
          Your test has been successfully uploaded.
        </div>
      @endif

      <table class="table table-bordered w-100 mx-auto">
        <thead class="table-primary">
          <tr>
            <th class="col-1" scope="col">№</th>
            <th scope="col">Title</th>
            <th class="col-1" scope="col">Count</th>
            <th class="col-1" scope="col">Info</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tests as $test)
            <tr>
              <th scope="row">{{ $frontCount++ }}</th>
              <td>{{ $test->name }}</td>
              <td >{{ count($test->answers) }}</td>
              <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('info', ['id' => $test->id]) }}" role="button">open</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $tests->links() }}

    </div>
  </div>
@endif

<script src="js/table-effects.js"></script>
@endsection
