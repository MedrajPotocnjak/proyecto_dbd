<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Alumno;
use App\Profesor;
use App\CoordinadorDocente;
use App\Administrador;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as MahAuth;

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
	public function handleProviderCallback()
    {
		try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        // check if they're an existing user
		$existingUser = Alumno::where('correo', $user->email)->first();
		if($existingUser){
			// log them in
			$id=$existingUser->id;
			auth()->guard('alumno')->login($existingUser,true);
			return redirect('alumno/'.$id.'/home');
		}
		else {
			return redirect('/');
		}

    }
	
	public function loginMulti($tipo_login,$rut,$pass) {
		if ($tipo_login=='alumno') {
			$alumno_existente=Alumno::where('rut',$rut)->first();
			if ($alumno_existente) {
				
				if ($alumno_existente->password==$pass) {
					$id=$alumno_existente->id;
					auth()->guard('alumno')->login($alumno_existente,true);
					return redirect('alumno/'.$id.'/home');
				}
			}
			return redirect('/');
		}
		else if ($tipo_login=='profesor') {
			$profesor_existente=Profesor::where('rut',$rut)->first();
			if ($profesor_existente) {
				if ($profesor_existente->password==$pass) {
					$id=$profesor_existente->id;
					auth()->guard('profesor')->login($profesor_existente,true);
					return redirect('profesor/'.$id.'/home');
				}
			}
			return redirect('/');
		}
		else if ($tipo_login=='coordinador') {
			$coordinador_existente=CoordinadorDocente::where('rut',$rut)->first();
			if ($coordinador_existente) {
				if ($coordinador_existente->password==$pass) {
					$id=$coordinador_existente->id;
					auth()->guard('coordinador')->login($coordinador_existente,true);
					return redirect('coordinador/'.$id.'/home');
				}
			}
			return redirect('/');
		}
		else if ($tipo_login=='admin') {
			$admin_existente=Administrador::where('rut',$rut)->first();
			if ($admin_existente) {
				if ($admin_existente->password==$pass) {
					$id=$admin_existente->id;
					auth()->guard('administrador')->login($admin_existente,true);
					return redirect('administrador/'.$id.'/home');
				}
			}
			return redirect('/');
		}
		return redirect('/');
	}
	
	
	public function getLoggedUserName(){
		if (MahAuth::check()) {
			return "yass";
		}
		return "Noon";
	}
}
