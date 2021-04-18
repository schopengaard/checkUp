<?php
namespace checkUp\Http\Controllers\Auth;

use checkUp\Models\Patient;
use checkUp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterPAtientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $table = 'patient';
    protected $redirectTo = '/patient/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'care_card' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:patient'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patient'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \checkUp\User
     */
    protected function create(array $data)
    {
        return Patient::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'age' => $data['age'],
            'care_card' => $data['care_card'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
