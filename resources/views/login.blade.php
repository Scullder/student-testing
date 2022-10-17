@extends('layouts.clear_app')
@section('title', 'Login')
@section('body')

<div class="rl-main-back bg-light">
  <div class="container">
    <div class="rl-form mx-auto">
      <div class="border w-100 rounded-3 p-4 mx-auto bg-white">
        <form class="" action="{{ route('loginAction') }}" method="post">
          @csrf

          @if(session('loginError'))
            <div class="alert alert-danger" role="alert">
              {{ session('loginError')}}
            </div>
          @endif

          <div class="mt-3">
            <label for="login" class="form-label"><b>Your login</b></label><br>
            <input type="login" value="{{ old('login') }}" class="w-100 @error('login') border border-danger validate-error-input @enderror my-text-input" id="login" name="login">
          </div>
          @error('login')
            <div class="validate-error-message">
              {{ $message }}
            </div>
          @enderror

          <div class="mt-3">
            <label for="password" class="form-label"><b>Password</b></label><br>
            <input type="password" class="w-100 my-text-input @error('login') border border-danger validate-error-input @enderror" id="password" name="password">
          </div>
          @error('password')
            <div class="validate-error-message">
              {{ $message }}
            </div>
          @enderror

          <div class="row mb-1 mt-4 w-100 ">
            <div class="col text-end px-0 mx-0 text-center">
              <a href="{{ route('registrRender')}}">Don't have account?</a>
            </div>
          </div>

          <button type="submit" class="btn btn-success w-100 mt-4 mb-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
