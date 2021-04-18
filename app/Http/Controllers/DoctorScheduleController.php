<?php
namespace checkUp\Http\Controllers;

use DB;
use Auth;
use Carbon;
use checkUp\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use checkUp\Http\Controllers\Controller;

class DoctorScheduleController extends Controller
{
	public function index()
	{
		$id = Auth::user()->id;
		$doctor_schedule = DB::table('doctor_schedule')->where('doctor_id', $id)->paginate(7);
		return view('doctor.dashboard', ['doctor_schedule' => $doctor_schedule], ['id' => $id]);
	}

	public function store_appointment(Request $request)
	{
		$date = $request->get('date');
		$time = $request->get('time');
		$patient_id = $request->get('patient_id');
		$doctor_id = $request->get('doctor_id');
		$description = $request->get('description');
		$medicine = $request->get('medicine');
		$appointment = DB::insert
		('insert into appointment(date, time, patient_id, doctor_id, description, medicine) value(?,?,?,?,?,?)',
							[$date, $time, $patient_id, $doctor_id, $description, $medicine]);
		if($doctor){
			$red = redirect('doctor.dashboard')->with('success', 'Data has been added');
		}
		else{
			$red = redirect('doctor.create_patient')->with('danger', 'Input data failed, please try again');
		}
		return $red;
	}

	public function destroy_appointment($id)
	{
		$day = DB::select('SELECT day FROM `doctor_schedule` WHERE date = CURRENT_DATE()');
		$delete_day = DB::delete('delete * from doctor_schedule where day=?',[$day]);
		$future_date = 'DATE_ADD(CURDATE(), INTERVAL 28 DAY)';
		$future_dayname = 'DAYNAME(DATE_ADD(CURDATE(), INTERVAL 28 DAY))';
		$add_day = DB::insert('insert into doctor_schedule set doctor_id=?, date=?, day=?, day_of_week=?, h1=?, h2=?, h3=?, h4=?, h5=?, h6=?, h7=?, h8=?',
		[$doctor_id, $future_date, $day, $future_dayname, null, null, null, null, null, null, null, null]);

		return back()->with('success', 'Appointment has been deleted successfully!');
	}

	public function search_appointment(Request $request)
	{
		$search = $request->get('search');
		$data = DB::table('appointment')
				->where('date', 'like', '%'.$search.'%')
				->orWhere('time', 'like', '%'.$search.'%')
				->orWhere('patient_id', 'like', '%'.$search.'%')
				->paginate(10);
		return view('doctor.dashboard', ['appointment' => $data]);
	}

	public function edit_appointment($id)
	{
		$appointment = DB::select('select * from appointment where id=?',[$id]);
		return view('doctor.edit_appointment', ['appointment' => $appointment]);
	}

	public function update_appointment(Request $request, $id)
	{
		$date = $request->get('date');
		$time = $request->get('time');
		$description = $request->get('description');
		$medicine = $request->get('medicine');

		if($appointment){
			$red = redirect('doctor')->with('success', 'Appointment has been updated successfully!');
		} else {
			$red = redirect('doctor/edit_patient', $id)->with('danger', 'Error, please try again');
		}
		return $red;
	}


	public function show_appointment($id)
	{
		$appointment = DB::table('appointment')->where('id', $id)->get();
		return view('doctor.show_appointment', ['appointment' => $appointment]);
	}
}
