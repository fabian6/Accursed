<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginProController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:programador')->except('logout');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function mostrarLoginPro(){
        return view('auth.loginPro');
    }

    public function loginPro(Request $request){
        $credentials = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('programador')->attempt($credentials, $request->remember)){
            return redirect()->intended(route('evaluar-alumno'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
