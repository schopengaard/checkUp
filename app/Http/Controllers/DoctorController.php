<?php
namespace checkUp\Http\Controllers;

use DB;
use Auth;
use Carbon;
use checkUp\Models\Patient;
use checkUp\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use checkUp\Http\Controllers\Controller;

class DoctorController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:doctor');
	}

	public function index()
	{
		$id = Auth::user()->id;
		$patient = DB::table('patient');
		$doctor = DB::table('doctor');
		$appointment = DB::table('appointment')->where('doctor_id', $id)->paginate(10);
		$doctor_schedule = DB::table('doctor_schedule')->where('doctor_id', $id)->paginate(10);
		return view('doctor.dashboard', ['appointment' => $appointment], ['doctor_schedule' => $doctor_schedule], ['doctor' => $doctor], ['patient' => $patient]);
	}

	public function edit_doctor($id)
	{
		$doctor = DB::select('select * from doctor where id=?',[$id]);
		return view('doctor.edit_doctor', ['doctor' => $doctor]);
	}

	public function future_appointment_page()
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$appointment = DB::table('appointment')
			->join('doctor', 'doctor.id', '=', 'appointment.doctor_id')
			->join('patient', 'patient.id', '=', 'appointment.patient_id')
			->select(	'appointment.id',
						'appointment.date',
						'appointment.time',
						'doctor.first_name AS d_first_name',
						'doctor.last_name AS d_last_name',
						'patient.first_name AS p_first_name',
						'patient.last_name AS p_last_name',
						'appointment.description',
						'appointment.bill_id')
			->where('doctor.id', $id)
			->where('date', '>', $today)
			->orderBy('date', 'asc')
			->orderBy('time', 'asc')
			->paginate(10);
		return view('doctor.future_appointment_page', ['appointment' => $appointment]);
	}

	public function past_appointment_page()
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$appointment = DB::table('appointment')
			->join('doctor', 'doctor.id', '=', 'appointment.doctor_id')
			->join('patient', 'patient.id', '=', 'appointment.patient_id')
			->select(	'appointment.id',
						'appointment.date',
						'appointment.time',
						'doctor.first_name AS d_first_name',
						'doctor.last_name AS d_last_name',
						'patient.first_name AS p_first_name',
						'patient.last_name AS p_last_name',
						'appointment.description',
						'appointment.bill_id')
			->where('doctor.id', $id)
			->where('date', '<', $today)
			->orderBy('date', 'desc')
			->orderBy('time', 'desc')
			->paginate(10);
		return view('doctor.past_appointment_page', ['appointment' => $appointment]);
	}

	public function history_page()
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$upcoming = DB::table('appointment')->where('date', '>', $today);
		$history = $upcoming->where('doctor_id', $id)->paginate(10);
		return view('doctor.history_page', ['history' => $history]);
	}

	public function patient_page()
	{
		$patient = DB::table('patient')->paginate(10);
		return view('doctor.patient_page', ['patient' => $patient]);
	}

	public function schedule_page()
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$schedule = DB::table('doctor_schedule')->where('doctor_id', $id)->get();
		return view('doctor.schedule_page', ['schedule' => $schedule]);
	}

	public function create_appointment() {
		$patient = DB::table('patient')->get();
		return view ('doctor.create_appointment', ['patient' => $patient]);
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

	public function search_appointment(Request $request)
	{
		$search = $request->get('search');
		$appointment = DB::table('appointment')
				->where('date', 'like', '%'.$search.'%')
				->orWhere('time', 'like', '%'.$search.'%')
				->orWhere('patient_id', 'like', '%'.$search.'%')
				->paginate(10);
		return view('doctor.appointment_page', ['appointment' => $appointment]);
	}
	public function search_patient(Request $request)
	{
		$search = $request->get('search');
		$patient = DB::table('patient')
				->where('id', 'like', '%'.$search.'%')
				->orWhere('first_name', 'like', '%'.$search.'%')
				->orWhere('last_name', 'like', '%'.$search.'%')
				->orWhere('age', 'like', '%'.$search.'%')
				->orWhere('care_card', 'like', '%'.$search.'%')
				->paginate(10);
		return view('doctor.patient_page', ['patient' => $patient]);
	}
	public function search_schedule(Request $request)
	{
		$id = Auth::user()->id;
		$search = $request->get('search');
		$schedule = DB::table('doctor_schedule')
				->where('date', 'like', '%'.$search.'%')
				->orWhere('day', 'like', '%'.$search.'%')
				->orWhere('day_of_week', 'like', '%'.$search.'%')
				->paginate(10);
		return view('doctor.schedule_page', ['schedule' => $schedule]);
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
		$appointment = DB::update
		('update appointment set date=?, time=?, description=?, medicine=?, where id=?',
							[$date, $time, $description, $medicine, $id]);
		if($appointment){
			$red = redirect('doctor')->with('success', 'Appointment has been updated successfully!');
		} else {
			$red = redirect('doctor/edit_patient', $id)->with('danger', 'Error, please try again');
		}
		return $red;
	}

	public function destroy_appointment($id)
	{
		$appointment = DB::table('appointment')->where('id', $id)->delete();
		return back()->with('success', 'Appointment has been deleted successfully!');
	}

	public function show_future_appointment($id)
	{
		$today = Carbon\Carbon::now();
		$appointment = DB::table('appointment')
				->join('patient', 'patient.id', '=', 'appointment.patient_id')
				->select(	'appointment.id',
							'appointment.date',
							'appointment.time',
							'patient.first_name AS p_first_name',
							'patient.last_name AS p_last_name',
							'appointment.description',
							'appointment.medicine_reminder')
				->where('appointment.id', $id)
				->get();
		return view('doctor.show_future_appointment', ['appointment' => $appointment]);
	}
	public function show_past_appointment($id)
	{
		$today = Carbon\Carbon::now();
		$appointment = DB::table('appointment')
				->join('patient', 'patient.id', '=', 'appointment.patient_id')
				->select(	'appointment.id',
							'appointment.date',
							'appointment.time',
							'patient.first_name AS p_first_name',
							'patient.last_name AS p_last_name',
							'appointment.description',
							'appointment.medicine_reminder')
				->where('appointment.id', $id)
				->get();
		return view('doctor.show_past_appointment', ['appointment' => $appointment]);
	}

}
