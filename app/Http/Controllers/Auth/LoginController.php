<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    public function username()
    {
        return 'username';
    }
    public function authenticated()
    {
        if (Auth::check()) {
            if (Auth::user()->level == 'Admin')  // 1 = ADMIN
            {
                return redirect('/halaman_admin/adm/data_admin')->with('success', 'Anda Sudah Berhasil Login');
            } 
            else if (Auth::user()->level == 'Mahasiswa') // 2 = Mahasiswa
            {
                return redirect('/halaman_mahasiswa/registrasi')->with('success', 'Anda Sudah Berhasil Login');
            }
            else if (Auth::user()->level == 'Komisi') // 3 = Komisi
            {
                return redirect('/halaman_komisi/laporan')->with('success', 'Anda Sudah Berhasil Login');
            }
            else if (Auth::user()->level == 'Dosen') // 4 = Dosen
            {
                return redirect('/halaman_dosen/Datajadwal')->with('success', 'Anda Sudah Berhasil Login');
            }
        }  else {
            return redirect('/login')->with('errors', 'Kombinasi Username dan Password tidak cocok');
        }
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('login');
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
 
        $request->session()->flush();
 
        $request->session()->regenerate();
 
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return redirect('/login')->with('custom-error', 'Kombinasi Username dan Password tidak cocok.');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ],[
            'username.required' => 'Silahkan isi Username',
            'password.required' => 'Silahkan isi Password'
        ]);
    }
}
