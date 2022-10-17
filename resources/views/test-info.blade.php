@extends('layouts.app')
@section('title', 'All tests')
@section('body')
	<div class="container-fluid d-flex justify-content-center min-vh-100">
	  	<div class="w-75 my-3 bg-white shadow-lg border rounded py-4 px-5">
	  		<div class="w-100 mx-auto">
	  			<div class="mb-3">
					  <label for="title" class="form-label">Test title</label>
					  <input type="text" value="{{ $test->name }}" class="form-control" id="title" readonly>
					</div>

					<div class="mb-3">
					  <label for="link" class="form-label">Link</label>
					  <input type="text" value="{{ route('answerRender', ['teacher' => auth()->user()->login, 'testId' => $test->id])}}" class="form-control" id="link" readonly>
					</div>

			    <div class="w-100 mt-5">
					<div class="text-center"><h5><b>Result list</b></h5></div>

					<table class="table mx-auto table-bordered">
					<thead class="table-primary">
					  <tr>
					    <th class="col-4" scope="col">Fio</th>
					    <th scope="col-5" scope="col">Email</th>
					    <th scope="col">Score</th>
					  </tr>
					</thead>
					<tbody>
						@if(count($results) > 0)
					    	@foreach($results as $result)
								<tr>
					        		<td>{{ $result->fio }}</td>
					        		<td>{{ $result->email }}</td>
					        		<td>{{ $result->score }}/{{ $test->size }}</td>
					        	</tr>
					    	@endforeach
						@endif
					</tbody>
					</table>

		    	{{ $results->links() }}

		    </div>
	 		</div>
	 	</div>
  </div>

<script src="{{ asset('js/table-effects.js') }}"></script>
@endsection
