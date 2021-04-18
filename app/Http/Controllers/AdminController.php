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

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index()
	{
		$id = Auth::user()->id;
		return view('admin.dashboard');
	}

	public function edit_admin($id)
	{
		$admin = DB::select('select * from admin where id=?',[$id]);
		return view('admin.edit_admin', ['admin' => $admin]);
	}
	public function update_admin(Request $request, $id)
	{
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$email = $request->get('email');
		$username = $request->get('username');
		$password = Hash::make($request->get('password'));
		$admin = DB::update
		('update admin set first_name=?, last_name=?, email=?, username=?, password=? where id=?',
							[$first_name, $last_name, $email, $username, $password, $id]);
		if($admin){
			$red = redirect('admin')->with('success', 'Admin has been updated successfully!');
		} else {
			$red = redirect('admin', $id)->with('danger', 'Error, please try again');
		}
		return $red;
	}

	public function patient_page()
	{
		$id = Auth::user()->id;
		$patient = DB::table('patient')->paginate(10);
		return view('admin.patient_page', ['patient' => $patient]);
	}
	public function doctor_page()
	{
		$id = Auth::user()->id;
		$doctor = DB::table('doctor')->paginate(10);
		return view('admin.doctor_page', ['doctor' => $doctor]);
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
			->where('date', '>', $today)
			->orderBy('date', 'asc')
			->orderBy('time', 'asc')
			->paginate(10);
		return view('admin.future_appointment_page', ['appointment' => $appointment]);
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
			->where('date', '<', $today)
			->orderBy('date', 'desc')
			->orderBy('time', 'desc')
			->paginate(10);
		return view('admin.past_appointment_page', ['appointment' => $appointment]);
	}

	public function bill_page()
	{
		$id = Auth::user()->id;
		$bill = DB::table('bill')->paginate(10);
		return view('admin.bill_page', ['bill' => $bill]);
	}
	public function medicine_page()
	{
		$id = Auth::user()->id;
		$medicine = DB::table('medicine')->paginate(10);
		return view('admin.medicine_page', ['medicine' => $medicine]);
	}

	public function create_patient() {
		return view('admin.create_patient');
	}
	public function create_doctor() {
		return view('admin.create_doctor');
	}
	public function create_appointment() {
		$doctor = DB::table('doctor')->orderBy('first_name')->get();
		$patient = DB::table('patient')->orderBy('first_name')->get();
		return view ('admin.create_appointment', ['doctor' => $doctor], ['patient' => $patient]);
	}
	public function create_bill() {
		return view ('admin.create_bill');
	}
	public function create_medicine() {
		return view ('admin.create_medicine');
	}

	public function store_patient(Request $request)
	{
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$email = $request->get('email');
		$username = $request->get('username');
		$password = Hash::make($request->get('password'));
		$age = $request->get('age');
		$care_card = $request->get('care_card');
		$doctor = DB::insert
		('insert into patient(first_name, last_name, email, username, password, age, care_card) value(?,?,?,?,?,?,?)',
							[$first_name, $last_name, $email, $username, $password, $age, $care_card]);
		if($doctor){
			$red = redirect(view('admin.dashboard'))->with('success', 'Data has been added');
		}
		else{
			$red = redirect(view('admin.create_patient'))->with('danger', 'Input data failed, please try again');
		}
		return $red;
	}
	public function store_doctor(Request $request)
	{
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$email = $request->get('email');
		$username = $request->get('username');
		$password = Hash::make($request->get('password'));
		$age = $request->get('age');
		$specialty = $request->get('specialty');
		$city = $request->get('city');
		$address = $request->get('address');
		$doctor = DB::insert
		('insert into doctor(first_name, last_name, email, username, password, age, specialty, city, address) value(?,?,?,?,?,?,?,?,?)',
							[$first_name, $last_name, $email, $username, $password, $age, $specialty, $city, $address]);
		if($admin){
			$red = redirect(view('admin.dashboard'))->with('success', 'Data has been added');
		}
		else{
			$red = redirect(view('admin.create_doctor'))->with('danger', 'Input data failed, please try again');
		}
		return $red;
	}
	public function store_appointment(Request $request)
	{
		$date = $request->get('date');
		$time = $request->get('time');
		$doctor_id = $request->get('doctor_id');
		$patient_id = $request->get('patient_id');
		$description = $request->get('description');
		$appointment = DB::insert
		('insert into appointment(date, time, doctor_id, patient_id, description) value(?,?,?,?,?)',
							[$date, $time, $doctor_id, $patient_id, $description]);
		if($appointment){
			$red = redirect('admin/appointment_page')->with('success', 'Data has been added');
		}
		else{
			$red = redirect('admin/appointment_page')->with('danger', 'Input data failed, please try again');
		}
		return $red;
	}
	public function store_bill(Request $request)
	{
		$amount = $request->get('amount');
		$description = $request->get('description');
		$bill = DB::insert
		('insert into appointment($amount, description) value(?,?)',
							[$amount, $description]);
		if($appointment){
			$red = redirect('admin/bill_page')->with('success', 'Data has been added');
		}
		else{
			$red = redirect('admin/bill_page')->with('danger', 'Input data failed, please try again');
		}
		return $red;
	}
	public function store_medicine(Request $request)
	{
		$price = $request->get('price');
		$name = $request->get('name');
		$description = $request->get('description');
		$medicine = DB::insert
		('insert into medicine($price, $name, $description) value(?,?,?)',
							[$amount, $name, $description]);
		if($medicine){
			$red = redirect('admin/medicine_page')->with('success', 'Data has been added');
		}
		else{
			$red = redirect('admin/medicine_page')->with('danger', 'Input data failed, please try again');
		}
		return $red;
	}

	public function search_patient(Request $request)
	{
		$search = $request->get('search_patient');
		$patient = DB::table('patient')
				->where('id', 'like', '%'.$search.'%')
				->orWhere('first_name', 'like', '%'.$search.'%')
				->orWhere('last_name', 'like', '%'.$search.'%')
				->orWhere('email', 'like', '%'.$search.'%')
				->orWhere('username', 'like', '%'.$search.'%')
				->orWhere('age', 'like', '%'.$search.'%')
				->orderBy('care_card', 'desc')
				->paginate(10);
		return view('admin.patient_page', ['patient' => $patient]);
	}

	public function search_doctor(Request $request)
	{
		$search = $request->get('search_doctor');
		$doctor = DB::table('doctor')
				->where('id', 'like', '%'.$search.'%')
				->orWhere('first_name', 'like', '%'.$search.'%')
				->orWhere('last_name', 'like', '%'.$search.'%')
				->orWhere('email', 'like', '%'.$search.'%')
				->orWhere('username', 'like', '%'.$search.'%')
				->orWhere('age', 'like', '%'.$search.'%')
				->orWhere('specialty', 'like', '%'.$search.'%')
				->orWhere('city', 'like', '%'.$search.'%')
				->orWhere('address', 'like', '%'.$search.'%')
				->orderBy('id', 'desc')
				->paginate(10);
		return view('admin.doctor_page', ['doctor' => $doctor]);
	}
	/*
	public function search_future_appointment(Request $request)
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$search = $request->get('search_appointment');
		$appointment =
			->where('date', '>', $today)
			->where('date', 'like', '%'.$search.'%')
			->orWhere('time', 'like', '%'.$search.'%')
			->orWhere('doctor_id', 'like', '%'.$search.'%')
			->orderBy('date', 'desc')
			->orderBy('time', 'desc')
			->paginate(10);
		return view('admin.future_appointment_page', ['appointment' => $appointment]);
	}
	public function search_past_appointment(Request $request)
	{
		$id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$search = $request->get('search_appointment');
		$appointment =
			->where('date', 'like', '%'.$search.'%')
			->orWhere('time', 'like', '%'.$search.'%')
			->orWhere('doctor_id', 'like', '%'.$search.'%')
			->orderBy('date', 'desc')
			->orderBy('time', 'desc')
			->paginate(10);
		return view('admin.past_appointment_page', ['appointment' => $appointment]);
	}*/
	public function search_bill(Request $request)
	{
		$search = $request->get('search_bill');
		$bill = DB::table('bill')
				->where('id', 'like', '%'.$search.'%')
				->orWhere('amount', 'like', '%'.$search.'%')
				->orWhere('description', 'like', '%'.$search.'%')
				->orderBy('id', 'desc')
				->paginate(10);
		return view('admin.bill_page', ['bill' => $bill]);
	}
	public function search_medicine(Request $request)
	{
		$search = $request->get('search_medicine');
		$medicine = DB::table('medicine')
				->where('id', 'like', '%'.$search.'%')
				->orWhere('price', 'like', '%'.$search.'%')
				->orWhere('name', 'like', '%'.$search.'%')
				->orWhere('description', 'like', '%'.$search.'%')
				->orderBy('id', 'desc')
				->paginate(10);
		return view('admin.medicine_page', ['medicine' => $medicine]);
	}


	public function edit_patient($id)
	{
		$patient = DB::select('select * from patient where id=?',[$id]);
		return view('admin.edit_patient', ['patient' => $patient]);
	}

	public function edit_doctor($id)
	{
		$doctor = DB::select('select * from doctor where id=?',[$id]);
		return view('admin.edit_doctor', ['doctor' => $doctor]);
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

	public function update_doctor(Request $request, $id)
	{
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$email = $request->get('email');
		$username = $request->get('username');
		$password = Hash::make($request->get('password'));
		$age = $request->get('age');
		$specialty = $request->get('specialty');
		$city = $request->get('city');
		$address = $request->get('address');
		$doctor = DB::update
		('update doctor set first_name=?, last_name=?, email=?, username=?, password=?, age=?, specialty=?, city=?, address=? where id=?',
							[$first_name, $last_name, $email, $username, $password, $age, $specialty, $city, $address , $id]);
		if($doctor){
			$red = redirect('admin/doctor_page')->with('success', 'Doctor has been updated successfully!');
		} else {
			$red = redirect('admin/doctor_page', $id)->with('danger', 'Error, please try again');
		}
		return $red;
	}

	public function destroy_patient($id)
	{
		$patient = DB::delete('delete from patient where id=?', [$id]);
		$red = redirect('patient');
		return $red;
	}
	public function destroy_doctor($id)
	{
		$doctor = DB::delete('delete from doctor where id=?', [$id]);
		$red = redirect('doctor');
		return $red;
	}

	public function show_patient($id)
	{
		$patient = DB::table('patient')->where('id', $id)->get();
		return view('admin.show_patient', ['patient' => $patient]);
	}
	public function show_doctor($id)
	{
		$doctor = DB::table('doctor')->where('id', $id)->get();
		return view('admin.show_doctor', ['doctor' => $doctor]);
	}
}
