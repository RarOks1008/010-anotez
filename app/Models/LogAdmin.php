<?php

namespace App\Models;


class LogAdmin {
    private $table = 'log';

    public function getLogs () {
        return \DB::table($this->table)
            ->select("ip", "user", "detail", "date")
            ->get();
    }

    public function insertLog($ip, $user, $detail, $date) {
        return \DB::table($this->table)
            ->insertGetId(['ip' => $ip, 'user' => $user, 'detail' => $detail, 'date' => $date]);
    }
}
