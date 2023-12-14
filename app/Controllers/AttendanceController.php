<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AttendanceController extends BaseController
{
    public function index()
    {
        $attendanceModel = new \App\Models\Attendance();
        $pager = \Config\Services::pager();

        $data = [
            'attendances' => $attendanceModel->paginate(10, 'attendance'),
            'pager' => $pager,
            'current_page' => 'attendance'
        ];

        return view('attendances/index', $data);
    }

    public function create()
    {
        return view('attendances/create', [
            'current_page' => 'attendance'
        ]);
    }

    public function store()
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'title' => [
                'rules' => 'required|min_length[3]',
            ],
            'description' => [
                'rules' => 'required|min_length[3]'
            ],
            'entry_time' => [
                'rules' => 'required|min_length[5]'
            ],
            'limit_entry_time' => [
                'rules' => 'required|min_length[5]'
            ],
            'out_time' => [
                'rules' => 'required|min_length[5]'
            ],
            'limit_out_time' => [
                'rules' => 'required|min_length[5]'
            ]
        ]);

        if (!$validation) {
            return view('attendances/create', [
                'validation' => $this->validator,
                'current_page' => 'attendance'
            ]);
        } else {
            $request = \Config\Services::request();
            $attendanceModel = new \App\Models\Attendance();

            $data = [
                'title' => $request->getPost('title'),
                'description' => $request->getPost('description'),
                'entry_time' => $request->getPost('entry_time'),
                'limit_entry_time' => $request->getPost('limit_entry_time'),
                'out_time' => $request->getPost('out_time'),
                'limit_out_time' => $request->getPost('limit_out_time'),
            ];

            $attendanceModel->insert($data);

            return redirect()->to(site_url('attendance'))->with('success', 'Add attendance Successfully');
        }
    }

    public function edit($id)
    {
        $attendanceModel = new \App\Models\Attendance();

        return view('attendances/edit', [
            'attendance' => $attendanceModel->find($id),
            'current_page' => 'attendance'
        ]);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'title' => [
                'rules' => 'required|min_length[3]',
            ],
            'description' => [
                'rules' => 'required|min_length[3]'
            ],
            'entry_time' => [
                'rules' => 'required|min_length[5]'
            ],
            'limit_entry_time' => [
                'rules' => 'required|min_length[5]'
            ],
            'out_time' => [
                'rules' => 'required|min_length[5]'
            ],
            'limit_out_time' => [
                'rules' => 'required|min_length[5]'
            ]
        ]);

        if (!$validation) {
            return view('attendances/create', [
                'validation' => $this->validator,
                'current_page' => 'attendance'
            ]);
        } else {
            $request = \Config\Services::request();
            $attendanceModel = new \App\Models\Attendance();

            $data = [
                'title' => $request->getPost('title'),
                'description' => $request->getPost('description'),
                'entry_time' => $request->getPost('entry_time'),
                'limit_entry_time' => $request->getPost('limit_entry_time'),
                'out_time' => $request->getPost('out_time'),
                'limit_out_time' => $request->getPost('limit_out_time'),
            ];

            $attendanceModel->update($id, $data);

            return redirect()->to(site_url('attendance'))->with('success', 'Edit attendance Successfully');
        }
    }

    public function delete($id)
    {
        $attendanceModel = new \App\Models\Attendance();

        $attendance = $attendanceModel->find($id);

        if ($attendance) {
            $attendanceModel->delete($id);

            return redirect()->to(site_url('attendance'))->with('success', 'Delete attendance Successfully');
        }
    }
}
