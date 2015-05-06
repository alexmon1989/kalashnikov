<?php namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

/**
 * Трейт, что переоперделяет некоторые методы базового трейта AuthenticatesAndRegistersUsers
 */
trait AuthenticatesAndRegistersAdmins {

    use AuthenticatesAndRegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('admin.auth.register');
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
                'name' => 'required', 'password' => 'required',
            ], [
                'name.required' => "Поле <strong>Логин</strong> обязательно для заполнения.",
                'password.required' => 'Поле <strong>Пароль</strong> обязательно для заполнения.',
            ]
        );

        $credentials = $request->only('name', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('name', 'remember'))
            ->withErrors([
                'name' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'Неверная комбинация логина и пароля.';
    }
}
