@extends('layouts.clear_app')
@section('title', 'test')
<div class="container-fluid d-flex justify-content-center h-100">
	<div class="w-75 bg-white shadow-lg border px-5">
		<div class="w-75 mx-auto py-3">
			<div class="text-center w-100"><h3><b>{{ $testModel->name }}</b></h3></div>
				<form action="{{ route('answerAction') }}" method="post">
				  @csrf
				  <input type="text" name="testFile" value="{{ $testModel->user->login }}/{{ $testModel->file }}" hidden>
				  <input type="text" name="testId" value="{{ $testModel->id }}" hidden>

				  <input type="text" name="fio" placeholder="FIO or email" class="form-control mb-4 mt-4" id="fio">

					@foreach($testFile['test'] as $test)
						<div class="mb-4">
							{{ $frontCount++ }}. {{ $test['q'] }}

							@foreach($test['a'] as $answer)
								<br><input type="radio" name="answer[{{ $test['@attributes']['id'] }}]" value="{{ $answer['number'] }}" class="mx-4">
								{{ $answer['value'] }}
							@endforeach
						</div>
					@endforeach

					<input type="submit" class="btn btn-primary">
				</form>
		</div>
	</div>
</div>
@section('body')