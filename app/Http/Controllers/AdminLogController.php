<?php

namespace App\Http\Controllers;

use App\Models\LogAdmin;
use Illuminate\Http\Request;

class AdminLogController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new LogAdmin();
    }

    public function showLogs(Request $request) {
        $data = [];
        $data['logs'] = $this->model->getLogs();
        return view('admin.admin_show_logs', $data);
    }
}
