@extends('layouts.app')
@section('title', 'All tests')
@section('body')

<div class="container-fluid d-flex justify-content-center h-100">
  <div class="w-75 my-4">
     @if($errors->any())
        <div class="alert alert-danger w-75 mx-auto" role="alert">
          <h5><b>Validate errors:</b></h5>
          @foreach($errors->all() as $message)
            - {{ $message }}<br>
          @endforeach
        </div>
      @endif
    <div class="bg-white w-50 px-4 pt-4 pb-4 mx-auto border shadow-lg rounded">
      <h3 class="w-100 text-center">New test</h3>

      <form class="" action="{{ route('createAction') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <label for="name" class="form-label"><b>Test title</b></label><br>
          <input type="text" class="form-control" id="name" name="title" autocomplete="off">
        </div>

        <div class="mb-4">
          <label for="file" class="form-label"><b>File with test</b></label>
          <input class="form-control" type="file" id="file" name="file">
          <div class="form-text">Test can only be loaded in XML format</div>
        </div>

        <div class="mb-4">
          <label for="num" class="form-label"><b>Number of questions - </b><span id="range-val">1</span></label><br>
          <input type="range" class="form-range" min="1" max="50" step="1" id="num" name="size" value="1">
          <div class="form-text">Questions will be randomly selected</div>
        </div>

        <input type="submit" class="btn btn-primary btn-md w-100" value="create">
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#num').on('change', function(){
    $('#range-val').text($(this).val());
  });
})
</script>
@endsection
