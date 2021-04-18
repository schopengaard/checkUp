@extends('layouts.app')
@section('title', 'Patient Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._doctorHeader')
		@include('partials._doctortabs', array([$tab[0]=''], [$tab[1]=''], [$tab[2]='active'], [$tab[3]='']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ action('DoctorController@search_patient') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_patient" class="form-control" placeholder="Search Patients" aria-label="Search Patients" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-secondary">Search</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="card mb-3" style="border-radius: 15px; border-color: #A3BBB5">
	<table class="table table-sm table-hover tableBack mb-0">
		<thead>
			<tr>
				<th class="text-center" style="width: 30px">#</th>
				<th class="pl-3">Name</th>
				<th>Age</th>
				<th>Care Card</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($patient as $row)
			<tr>
				<td class="text-center border-right">{{ $row->id }}</td>
				<td class="pl-3">{{ $row->first_name }} {{ $row->last_name }}</td>
				<td>{{ $row->age }}</td>
				<td>{{ $row->care_card }}</td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='DoctorController@show_patient']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="pagination justify-content-center">
	{{ $patient->links() }}
</div>
@endsection
