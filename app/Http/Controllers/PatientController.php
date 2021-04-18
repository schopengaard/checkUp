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

class patientController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:patient');
	}

	public function index()
	{
		$id = Auth::user()->id;
		$username = Auth::user()->username;
		$patient = DB::table('patient');
		$doctor = DB::table('doctor');
		$doctor_name = DB::table('doctor')->get(array('first_name', 'last_name'));
		$appointment = DB::table('appointment')->where('patient_id', $id)->paginate(7);
		return view('patient.dashboard',
			['appointment' => $appointment], ['patient' => $patient], ['doctor' => $doctor], ['username' => $username], ['doctor_name' => $doctor_name]);
	}

	public function appointment_page()
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$appointment = DB::table('appointment')
			->join('doctor', 'doctor.id', '=', 'appointment.doctor_id')
			->select(	'appointment.id',
						'appointment.date',
						'appointment.time',
						'appointment.patient_id',
						'doctor.first_name AS d_first_name',
						'doctor.last_name AS d_last_name',
						'appointment.description')
			->where('date', '>', $today)
			->where('patient_id', $id)
			->orderBy('date', 'asc')
			->orderBy('time', 'asc')
			->paginate(10);
		return view('patient.appointment_page', ['appointment' => $appointment]);
	}
	public function doctor_page()
	{
		$id = Auth::user()->id;
		$doctor = DB::table('doctor')->paginate(10);
		return view('patient.doctor_page', ['doctor' => $doctor]);
	}
	public function medicine_reminder_page()
	{
		$id = Auth::user()->id;
		$medicine = DB::table('appointment')->where('patient_id', $id)->paginate(10);
		return view('patient.medicine_reminder_page', ['medicine' => $medicine]);
	}
	public function medical_history_page()
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$history = DB::table('appointment')
			->join('doctor', 'doctor.id', '=', 'appointment.doctor_id')
			->select(	'appointment.id',
						'appointment.date',
						'appointment.time',
						'doctor.first_name',
						'doctor.last_name',
						'appointment.description',
						'appointment.bill_id')
			->where('date', '<', $today)
			->where('patient_id', $id)
			->orderBy('date', 'desc')
			->orderBy('time', 'desc')
			->paginate(10);
		return view('patient.medical_history_page', ['history' => $history]);
	}

	public function create_appointment() {
		$doctor = DB::table('doctor')->get();
		return view ('patient.create_appointment', ['doctor' => $doctor]);
	}

	public function store_appointment(Request $request)
	{
		$patient_id = $request->get('patient_id');
		$date = $request->get('date');
		$time = $request->get('time');
		$doctor_id = $request->get('doctor_id');
		$description = $request->get('description');
		$appointment = DB::insert
		('insert into appointment(patient_id, date, time, doctor_id, description) value(?,?,?,?,?)',
							[$patient_id, $date, $time, $doctor_id, $description]);
		if($appointment){
			$red = redirect('patient/appointment_page')->with('success', 'Data has been added');
		}
		else{
			$red = redirect('patient/appointment_page')->with('danger', 'Input data failed, please try again');
		}
		return $red;
	}

	public function search_appointment(Request $request)
	{
		$id = Auth::user()->id;
		$search = $request->get('search');
		$data = DB::table('appointment')
				->join('doctor', 'doctor.id', '=', 'appointment.doctor_id')
				->select(	'appointment.id',
							'appointment.date',
							'appointment.time',
							'appointment.patient_id',
							'doctor.first_name AS d_first_name',
							'doctor.last_name AS d_last_name',
							'appointment.description',
							'appointment.bill_id')
				->where('appointment.patient_id', $id);
		$appointment = $data
				->where('appointment.time', 'like', '%'.$search.'%')
				->orWhere('doctor.first_name', 'like', '%'.$search.'%')
				->orWhere('doctor.last_name', 'like', '%'.$search.'%')
				->orWhere('appointment.description', 'like', '%'.$search.'%')
				->paginate(10);
		return view('patient.appointment_page', ['appointment' => $appointment]);
	}
	public function search_doctor(Request $request)
	{
		$search = $request->get('search_doctor');
		$doctor = DB::table('doctor')
				->where('id', 'like', '%'.$search.'%')
				->orWhere('first_name', 'like', '%'.$search.'%')
				->orWhere('last_name', 'like', '%'.$search.'%')
				->orWhere('age', 'like', '%'.$search.'%')
				->orWhere('specialty', 'like', '%'.$search.'%')
				->orWhere('city', 'like', '%'.$search.'%')
				->paginate(10);
		return view('patient.doctor_page', ['doctor' => $doctor]);
	}
	public function search_medicine_reminder(Request $request)
	{
		$search = $request->get('search');
		$id = Auth::user()->id;
		$list= DB::table('appointment')->where('patient_id', $id);
		$medicine = $list
				->where('id', 'like', '%'.$search.'%')
				->orWhere('description', 'like', '%'.$search.'%')
				->orWhere('medicine_reminder', 'like', '%'.$search.'%')
				->paginate(10);
		return view('patient.medicine_reminder_page', ['medicine' => $medicine]);
	}
	public function search_medical_history(Request $request)
	{
		$search = $request->get('search');
		$history = DB::table('appointment')
				->where('date', 'like', '%'.$search.'%')
				->orWhere('time', 'like', '%'.$search.'%')
				->orWhere('doctor_id', 'like', '%'.$search.'%')
				->paginate(10);
		return view('patient.medical_history_page', ['history' => $history]);
	}

	public function destroy_appointment($id)
	{
		$appointment = DB::table('appointment')->where('id', $id)->delete();
		return back()->with('success', 'Appointment has been deleted successfully!');
	}

	public function show_appointment($id)
	{
		$appointment = DB::table('appointment')->where('id', $id)->get();
		return view('patient.show_appointment', ['appointment' => $appointment]);
	}
	public function show_doctor($id)
	{
		$doctor = DB::table('doctor')->where('id', $id)->get();
		$agenda = DB::table('doctor_schedule')
			->where('doctor_id', $id);
		$doctor_schedule = $agenda->where('h1', '!=', null)->get();

		return view('patient.show_doctor', ['doctor' => $doctor], ['doctor_schedule' => $doctor_schedule]);
	}
	public function show_medicine_reminder($id)
	{
		$medicine_reminder = DB::table('appointment')->where('id', $id)->get();
		return view('patient.show_medicine_reminder', ['medicine_reminder' => $medicine_reminder]);
	}
	public function show_medical_history($id)
	{
		$history = DB::table('appointment')->where('id', $id)->get();
		return view('patient.show_medical_history', ['history' => $history]);
	}

	public function edit_patient($id)
	{
		$patient = DB::select('select * from patient where id=?',[$id]);
		return view('patient.edit_patient', ['patient' => $patient]);
	}

	public function update_patient(Request $request, $id)
	{
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$email = $request->get('email');
		$username = $request->get('username');
		$password = Hash::make($request->get('password'));
		$age = $request->get('age');
		$care_card = $request->get('care_card');
		$patient = DB::update
		('update patient set first_name=?, last_name=?, email=?, username=?, password=?, age=?, care_card=? where id=?',
							[$first_name, $last_name, $email, $username, $password, $age, $care_card, $id]);
		if($patient){
			$red = redirect('admin/patient_page')->with('success', 'Patient has been updated successfully!');
		} else {
			$red = redirect('admin/edit_patient', $id)->with('danger', 'Error, please try again');
		}
		return $red;
	}

}
