<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PresenceController extends BaseController
{
    protected $attendanceModel;

    public function __construct()
    {
        $this->attendanceModel = new \App\Models\Attendance();
    }

    public function index()
    {
        return view('presences/index', [
            'current_page' => 'presence',
            'attendances' => $this->attendanceModel->paginate(10, 'attendance'),
            'pager' => \Config\Services::pager(),
        ]);
    }
}
