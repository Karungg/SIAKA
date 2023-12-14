<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AttendanceController extends BaseController
{
    protected $attendanceModel;

    public function __construct()
    {
        $this->attendanceModel = new \App\Models\Attendance();
    }

    public function index()
    {
        $data = [
            'attendances' => $this->attendanceModel->paginate(10, 'attendance'),
            'pager' => \Config\Services::pager(),
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

            $data = [
                'title' => $request->getPost('title'),
                'description' => $request->getPost('description'),
                'entry_time' => $request->getPost('entry_time'),
                'limit_entry_time' => $request->getPost('limit_entry_time'),
                'out_time' => $request->getPost('out_time'),
                'limit_out_time' => $request->getPost('limit_out_time'),
            ];

            $this->attendanceModel->insert($data);

            return redirect()->to(site_url('attendance'))->with('success', 'Add attendance Successfully');
        }
    }

    public function edit($id)
    {
        return view('attendances/edit', [
            'attendance' => $this->attendanceModel->find($id),
            'current_page' => 'attendance'
        ]);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $request = \Config\Services::request();

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
            $data = [
                'title' => $request->getPost('title'),
                'description' => $request->getPost('description'),
                'entry_time' => $request->getPost('entry_time'),
                'limit_entry_time' => $request->getPost('limit_entry_time'),
                'out_time' => $request->getPost('out_time'),
                'limit_out_time' => $request->getPost('limit_out_time'),
            ];

            $this->attendanceModel->update($id, $data);

            return redirect()->to(site_url('attendance'))->with('success', 'Edit attendance Successfully');
        }
    }

    public function delete($id)
    {
        $attendance = $this->attendanceModel->find($id);

        if ($attendance) {
            $this->attendanceModel->delete($id);

            return redirect()->to(site_url('attendance'))->with('success', 'Delete attendance Successfully');
        }
    }
}
