<?php namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class AdminController extends Controller {

    public function __construct()
    {
        // Шлобальная перменная для шаблона - залогиненный пользователь
        View::share('auser', Auth::user());
    }

}
