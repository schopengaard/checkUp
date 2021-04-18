@extends('layouts.app')
@section('title', 'Schedule Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._doctorHeader')
		@include('partials._doctortabs', array([$tab[0]=''], [$tab[1]=''], [$tab[2]=''], [$tab[3]='active']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ action('DoctorController@search_schedule') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_schedule" class="form-control" placeholder="Search Schedule" aria-label="Search Schedule" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-secondary">Search</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="card mb-3" style="border-radius: 15px; border-color: #A3BBB5">
	<form class="" action="index.html" method="post">

	</form>
	<table class="table table-sm table-hover tableBack mb-0" >
		<thead>
			<tr class="text-center">
				<th class="text-right">Day</th>
				<th>Date</th>
				<th>Week</th>
				<th>09:00 AM</th>
				<th>10:00 AM</th>
				<th>11:00 AM</th>
				<th>12:00 PM</th>
				<th>01:00 PM</th>
				<th>02:00 PM</th>
				<th>03:00 PM</th>
				<th>04:00 PM</th>
				<th width="30px"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($schedule as $row)
			<tr class="text-center">
				<td class="text-right">{{ $row->day_of_week }}</td>
				<td>{{ $row->date }}</td>
				<td><input id="t0" class="checkitem" type="checkbox"></td>
				<td><input id="t1" class="checkitem" type="checkbox"></td>
				<td><input id="t2" class="checkitem" type="checkbox"></td>
				<td><input id="t3" class="checkitem" type="checkbox"></td>
				<td><input id="t4" class="checkitem" type="checkbox"></td>
				<td><input id="t5" class="checkitem" type="checkbox"></td>
				<td><input id="t6" class="checkitem" type="checkbox"></td>
				<td><input id="t7" class="checkitem" type="checkbox"></td>
				<td><input id="t8" class="checkitem" type="checkbox"></td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='DoctorController@show_schedule'], [$drop[1]='DoctorController@edit_schedule'], [$drop[2]='DoctorController@destroy_schedule']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section('scripts')
<script>
$("#t0").change(function(){
	$(".checkitem").prop('checked', $(this).prop('checked'));
})
$('.checkitem').change(function(){
	if($(this).prop('checked')==false){
		$('#t0').prop('checked', false)
	}
	if($('.checkitem:checked').length == $('.checkitem').length){
		$('#t0').prop('checked', true)
	}
})
</script>
@endsection
