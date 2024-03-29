<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Http\Request;

class AdministradorLoginController extends Controller
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
    protected $redirectTo = 'administrador/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:administrador,administrador/home')->except('logout');
    }
	
	public function redirectToProvider(Request $request)
    {
        return Socialite::driver('google')->with(['user_type' => $request->user_type])->redirect();
    }
	
	public function redirectTo()
    {
        return 'administrador/home';
    }
	protected function guard()
    {
        return \Auth::guard('administrador');
    }
}
