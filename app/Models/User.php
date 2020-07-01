<?php

namespace App\Models;


class User {
    private $table_long = 'user AS u';
    private $table_short = 'user';

    public function getLogin($email, $password){
        return \DB::table($this->table_long)
            ->join("role AS r", "u.role_id", "=", "r.id")
            ->select("r.name", "u.email", "u.id")
            ->where([
                ["email", "=", $email],
                ["password", "=", md5($password)]
            ])
            ->first();
    }
    public function emailTaken($email) {
        return \DB::table($this->table_short)
            ->select("email")
            ->where([
                ["email", "=", $email]
            ])
            ->first();
    }
    public function emailTakenWithId($email, $id) {
        return \DB::table($this->table_short)
            ->select("email")
            ->where([
                ["email", "=", $email],
                ["id", "!=", $id]
            ])
            ->first();
    }
    public function addUser($email, $password) {
        \DB::table($this->table_short)
            ->insert(['email' => $email, 'password' => md5($password)]);
    }

    public function getUsers() {
        return \DB::table($this->table_long)
            ->join("role AS r", "u.role_id", "=", "r.id")
            ->select("r.name", "u.email", "u.id")
            ->get();
    }

    public function deleteUser($id) {
        \DB::table($this->table_short)
            ->where('id', $id)
            ->delete();
    }

    public function getUserWithId($id) {
        return \DB::table($this->table_long)
            ->join("role AS r", "u.role_id", "=", "r.id")
            ->select("r.name", "u.email", "u.id")
            ->where([
                ["u.id", "=", $id]
            ])
            ->first();
    }
    public function editUser($email, $id) {
        \DB::table($this->table_short)
            ->where('id', $id)
            ->update(['email' => $email]);
    }
    public function editUserWithPassword($email, $password, $id) {
        \DB::table($this->table_short)
            ->where('id', $id)
            ->update(['email' => $email, 'password' => md5($password)]);
    }
}
