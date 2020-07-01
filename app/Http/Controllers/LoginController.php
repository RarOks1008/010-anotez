<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $model;

    public function __construct() {
        $this->model = new User();
    }

    public function login() {
        return view('pages.login');
    }

    public function loginDo(LoginRequest $request) {
        $email = $request->input("email");
        $password = $request->input("password");
        $user = $this->model->getLogin($email, $password);
        if ($user) {
            $request->session()->put("user", $user);
            return redirect("/");
        } else {
            return redirect("/login")->with("message", "Wrong params.");
        }
    }

    public function logout(Request $request) {
        $request->session()->forget("user");
        $request->session()->flush();
        return redirect("/login");
    }
}
