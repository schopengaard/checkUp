<?php
    namespace checkUp\Http\Controllers\Auth;
    use Illuminate\Http\Request;
    use checkUp\Http\Controllers\Controller;
    use Auth;
    use Route;
    class PatientLoginController extends Controller
    {
        protected $redirectTo = '/patient';
        public function __construct()
        {
            $this->middleware('guest:patient', ['except' => ['logout']]);
        }
        
        public function showLoginForm()
        {
            return view('auth.patient-login');
        }
        
        public function login(Request $request)
        {
          // Validate the form data
          $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
          ]);
          
          // Attempt to log the user in
          if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('patient.dashboard'));
          } 
          // if unsuccessful, then redirect back to the login with the form data
          return redirect()->back()->withInput($request->only('email', 'remember'));
        }
        
        public function logout()
        {
            Auth::guard('patient')->logout();
            return redirect('/');
        }
    }