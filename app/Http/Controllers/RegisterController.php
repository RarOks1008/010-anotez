<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $model;

    public function __construct() {
        $this->model = new User();
    }

    public function register() {
        return view('pages.register');
    }

    public function registerDo(LoginRequest $request) {
        $email = $request->input("email");
        $password = $request->input("password");
        $user = $this->model->emailTaken($email);
        if ($user) {
            return redirect("/register")->with("message", "Email already taken.");
        } else {
            $this->model->addUser($email, $password);
            return redirect("/login")->with("message", "User created successfully.");
        }
    }
}
