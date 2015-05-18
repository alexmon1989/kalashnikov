<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		], [
            'name.required' => 'Поле "Логин" обязательно для заполнения.',
            'name.max' => 'Количество символов в поле "Логин" не может превышать :max.',
            'email.required' => 'Поле "E-Mail" обязательно для заполнения.',
            'email.email' => 'Поле "E-Mail" должно быть действительным электронным адресом.',
            'email.max' => 'Количество символов в поле "E-Mail" не может превышать :max.',
            'email.unique' => 'Такое значение поля "E-Mail" уже существует.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.confirmed' => 'Поле "Пароль" не совпадает с подтверждением.',
            'password.min' => '"Количество символов в поле "Пароль" должно быть не менее :min.',
        ]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
