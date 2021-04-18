<?php
    namespace checkUp\Http\Controllers\Auth;
    use Illuminate\Http\Request;
    use checkUp\Http\Controllers\Controller;
    use Auth;
    use Route;
    class DoctorLoginController extends Controller
    {
        protected $redirectTo = '/doctor';
        public function __construct() {
            $this->middleware('guest:doctor', ['except' => ['logout']]);
        }
        
        public function showLoginForm()
        {
            return view('auth.doctor-login');
        }
        
        public function login(Request $request)
        {
          // Validate the form data
          $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
          ]);
          
          // Attempt to log the user in
          if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('doctor.dashboard'));
          } 
          // if unsuccessful, then redirect back to the login with the form data
          return redirect()->back()->withInput($request->only('email', 'remember'));
        }
        
        public function logout()
        {
            Auth::guard('doctor')->logout();
            return redirect('/');
        }
    }