<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function redirectToProvider(Request $request)
    {
        return Socialite::driver('google')->with(['user_type' => $request->user_type])->redirect();
    }
	/*
	public function handleProviderCallback2()
    {
		try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
		if($existingUser){
            // log them in
            auth()->login($existingUser, true);
			return redirect('/home');
		}
		else {
			return redirect('/');
		}
    }
	*/
	public function handleProviderCallback(Request $request)
    {
		try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
		$tipo_usuario=$request->user_type;
        // check if they're an existing user
		$existingUser = Alumno::where('correo', $user->email)->first();
		if($existingUser){
			// log them in
			auth()->guard('alumno')->login($existingUser,true);
			return redirect('alumno/home');
		}
		else {
			return redirect('/');
		}

    }
	
	public function loginMultiple(Request $request) {
		$tipo_usuario=$request->user_type;
		if ($tipo_usuario=='alumno') {
			$alumno_existente=App\Alumno::where('rut',$request->rut)->first();
			if ($alumno_existente) {
				if ($request->password==$alumno_existente->password) {
					auth()->guard('alumno')->login($alumno_existente,true);
					return redirect('/home');
				}
				else {
					return redirect('/login');
				}
			}
			else {
				return redirect('/login');
			}
		}
		else if ($tipo_usuario=='profesor') {
			$profesor_existente=App\Profesor::where('rut',$request->rut)->first();
			if ($profesor_existente) {
				if ($request->password==$profesor_existente->password) {
					auth()->guard('profesor')->login($profesor_existente,true);
					return redirect('/home');
				}
				else {
					return redirect('/login');
				}
			}
			else {
				return redirect('/login');
			}
		}
		else if ($tipo_usuario=='coordinador') {
			$coordinador_existente=App\CoordinadorDocente::where('rut',$request->rut)->first();
			if ($coordinador_existente) {
				if ($request->password==$coordinador_existente->password) {
					auth()->guard('coordinador')->login($coordinador_existente,true);
					return redirect('/home');
				}
				else {
					return redirect('/');
				}
			}
			else {
				return redirect('/');
			}
		}
		return redirect('/');
	}
	
	public function getLoggedUserName(){
		return response()->json("ok");
	}
}
