@extends('layouts.app')
@section('title', 'Medicine Reminder Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		@include('partials._patientHeader')
		@include('partials._patienttabs', array([$tab[0]=''], [$tab[1]=''], [$tab[2]='active'], [$tab[3]='']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ action('PatientController@search_medicine_reminder') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_medicine_reminder" class="form-control" placeholder="Search Medicine Reminders" aria-label="Search Medicine Reminders" aria-describedby="basic-addon2">
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
				<th class="text-center" style="width: 40px">#</th>
				<th class="pl-3">Description</th>
				<th>Medicine Note</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($medicine as $row)
			<tr>
				<td class="text-center border-right">{{ $row->id }}</td>
				<td class="pl-3">{{ $row->description }}</td>
				<td>{{ $row->medicine_reminder }}</td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='PatientController@show_medicine_reminder']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="pagination justify-content-center">
	{{ $medicine->links() }}
</div>
@endsection
