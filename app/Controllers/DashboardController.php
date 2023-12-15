<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    protected $userModel, $positionModel, $attendanceModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
        $this->positionModel = new \App\Models\Position();
        $this->attendanceModel = new \App\Models\Attendance();
    }

    public function index()
    {
        return view('dashboard/index', [
            'current_page' => 'dashboard',
            'total_user' => $this->userModel->countAll(),
            'total_position' => $this->positionModel->countAll(),
            'total_attendance' => $this->attendanceModel->countAll()
        ]);
    }
}
