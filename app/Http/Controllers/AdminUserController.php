<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function showUsers(Request $request) {
        $data = [];
        $data['users'] = $this->model->getUsers();
        return view('admin.admin_show_users', $data);
    }

    public function editUser(Request $request, $id = 0) {
        $data = [];
        $data['user'] = $this->model->getUserWithId($id);
        if ($data['user']) {
            return view('admin.admin_edit_user', $data);
        }
        return redirect("admin/show_users")->with("message", "You don't have the right to see this user or the user does not exist.");
    }

    public function adminEditUser(EditUserRequest $request) {
        $email = $request->input("email");
        $password = $request->input("password");
        $id = $request->input("id");
        $user = $this->model->emailTakenWithId($email, $id);
        if ($user) {
            return redirect("/admin/edit_user/".$id)->with("message", "Email already taken.");
        } else {
            if (!$password) {
                $this->model->editUser($email, $id);
            } else {
                $this->model->editUserWithPassword($email, $password, $id);
            }
            return redirect("/admin/show_users");
        }
    }

    public function deleteUser(Request $request, $id = 0) {
        $user = $this->model->getUserWithId($id);
        if ($user) {
            $this->model->deleteUser($id);
            return redirect("admin/show_users");
        }
        return redirect("admin/show_users")->with("message", "You don't have the right to see this user or the user does not exist.");
    }

    public function addUser(Request $request) {
        return view('admin.admin_add_user');
    }

    public function adminAddUser(LoginRequest $request) {
        $email = $request->input("email");
        $password = $request->input("password");
        $user = $this->model->emailTaken($email);
        if ($user) {
            return redirect("/admin/add_user")->with("message", "Email already taken.");
        } else {
            $this->model->addUser($email, $password);
            return redirect("/admin/show_users");
        }
    }
}
