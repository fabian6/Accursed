<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Usuario;
use App\ProgramadorCurso;
class RegisterController extends Controller
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
    protected $redirectTo = '/';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'provinencia' => ['required', 'string', 'max:255'],
            'rol' => ['required','enum'],
            'expediente' => ['required', 'integer', 'max:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Usuario
     */
    // protected function create(array $data)
    // {
    //     return Usuario::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'provinencia' => $data['provinencia'],
    //         'rol' => $data['rol'],
    //         'expediente' => $data['expediente'],
    //     ]);
    // }
    
    /**
     * funcion que muestra el formulario de registro de cuenta de usuario
     */
    public function mostrarFormRegistro(){
        return view('auth.register');
    }
    /**
     * Funcion que registra al usuario en la base de datos
     */
    public function registrarUsuario(Request $request){
        $usuario = new Usuario();
        // dd($request->email, $request->expediente);
        $usuario->nombre = $request->nombre;
        $usuario->apellido= $request->apellido;
        $usuario->email = $request->email;
        $usuario->provinencia= $request->provinencia;
        $usuario->password = bcrypt(request('password'));
        $usuario->rol = 'alumno';
        $usuario->expediente = $request->expediente;
        $usuario->save();
        return redirect('/login');

    }

    public function mostrarFormRegistroAdmin(){
        return view('admin.administrar_registros');
    }
    
    public function administrarProgramador(Request $request){
        $programador = new ProgramadorCurso();
        // dd($request->email, $request->expediente);
        $programador->nombre = $request->nombre;
        $programador->apellido= $request->apellido;
        $programador->email = $request->email;
        $programador->password = bcrypt(request('password'));
        $programador->rol = $request->rol;
        $programador->expediente = $request->expediente;
        $programador->save();
        return redirect('/administrar-registros');

    }

    public function administrarDivisionalyDirector(Request $request){
        $usuario = new Usuario();
        // dd($request->email, $request->expediente);
        $usuario->nombre = $request->nombre;
        $usuario->apellido= $request->apellido;
        $usuario->email = $request->email;
        $usuario->provinencia= "unison";
        $usuario->password = bcrypt(request('password'));
        $usuario->rol = $request->rol;
        $usuario->save();
        return redirect('/administrar-registros');

    }
}
