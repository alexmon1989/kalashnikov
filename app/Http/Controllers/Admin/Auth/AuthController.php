<?php namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthenticatesAndRegistersAdmins;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Validation\Validator;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersAdmins;

    // Пути
    protected $redirectPath = 'admin/dashboard';
    protected $loginPath = 'admin/auth/login';
    protected $redirectAfterLogout = 'admin/auth/login';

	/**
	 * Create a new authentication controller instance.
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('auth', ['except' => ['getLogout', 'getLogin', 'postLogin']]);
	}
}
