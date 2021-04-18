@extends('layouts.app')
@section('content')
<div class="card w-100">
	@foreach($doctor as $d_row)
	<div class="card-header">
		<div class="row">
			<div class="col-sm-2">
				<a href="{{ action('PatientController@doctor_page') }}" class="nodeco">
					<i class="fas fa-chevron-left"></i>
					Back
				</a>
			</div>
			<div class="col-sm-8 text-center">
				{{ __('Doctor') }}
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">Doctor Name</div>
			<div class="col-md-7 card-text">{{ $d_row->first_name }} {{ $d_row->last_name }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Doctor ID</div>
			<div class="col-md-7 card-text">{{$d_row->id}}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Email</div>
			<div class="col-md-7 card-text">{{ $d_row->email }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Age</div>
			<div class="col-md-7 card-text">{{ $d_row->age }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Specialty</div>
			<div class="col-md-7 card-text">{{ $d_row->specialty }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">City</div>
			<div class="col-md-7 card-text">{{ $d_row->city }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Address</div>
			<div class="col-md-7 card-text">{{ $d_row->address }}</div>
		</div>
		<div class="mb-4"></div>
		<a href="{{ action('PatientController@index') }}" class="btn btn-primary">Back</a>
	</div>
	@endforeach
</div>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Date</th>
			<th>Day</th>
			<th>09:00</th>
			<th>10:00</th>
			<th>11:00</th>
			<th>12:00</th>
			<th>13:00</th>
			<th>14:00</th>
			<th>15:00</th>
			<th>16:00</th>
			<th class="actionBar">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($doctor_schedule as $row)
		<tr>
			<td>{{ $row->date }}</td>
			<td>{{ $row->day_of_week }}</td>
			<td>{{ $row->h1 }}</td>
			<td>{{ $row->h2 }}</td>
			<td>{{ $row->h3 }}</td>
			<td>{{ $row->h4 }}</td>
			<td>{{ $row->h5 }}</td>
			<td>{{ $row->h6 }}</td>
			<td>{{ $row->h7 }}</td>
			<td>{{ $row->h8 }}</td>
			<td class="text-right">
				<a href="{{ action('PatientController@show_doctor', $row->id) }}" class="btn btn-sm btn-info">Show</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection
@section('scripts')
<script>
if ( !empty ( $row->h1 ) ) {
	echo 'Something';
}
</script>
@endsection
