<?php
namespace checkUp\Http\Controllers;

use DB;
use checkUp\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use checkUp\Http\Controllers\Controller;

class CRUDController extends Controller
{
	protected $table = 'doctor';
	protected $redirectTo = '/admin/search';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
    	$doctor = DB::select('select * from doctor');
    	return view('admin.search', ['doctor' => $doctor]);
    }

    public function create()
    {
    	return view('admin.create');
    }

    public function store(Request $request)
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
    	$admin = DB::insert
    	('insert into doctor(first_name, last_name, email, username, password, age, specialty, city, address) value(?,?,?,?,?,?,?,?,?)', 
    						[$first_name, $last_name, $email, $username, $password, $age, $specialty, $city, $address]);
    	if($admin){
    		$red = redirect('admin/search')->with('success', 'Data has been added');
    	}
    	else{
    		$red = redirect('admin/create')->with('danger', 'Input data failed, please try again');
    	}
    	return $red;
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = DB::table('doctor')
                ->where('id', 'like', '%'.$search.'%')
                ->orWhere('first_name', 'like', '%'.$search.'%')
                ->orWhere('last_name', 'like', '%'.$search.'%')
                ->orWhere('age', 'like', '%'.$search.'%')
                ->orWhere('specialty', 'like', '%'.$search.'%')
                ->orWhere('city', 'like', '%'.$search.'%')
                ->orWhere('address', 'like', '%'.$search.'%')
                ->orderBy('id', 'desc')
                ->paginate(5);
        return view('index', ['doctor' => $data]);
    }

    public function show($id)
    {
    	$doctor = DB::select('select * from doctor');
    	return view('admin.search', ['doctor' => $doctor]);
    }
}