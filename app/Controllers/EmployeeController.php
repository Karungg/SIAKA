<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmployeeController extends BaseController
{
    public function index()
    {
        $employeeModel = new \Myth\Auth\Models\UserModel();
        $pager = \Config\Services::pager();

        $data = [
            'pager' => $pager,
            'current_page' => 'employee'
        ];
        $data['users'] = $employeeModel->findAll();

        return view('employees/index', $data);
    }

    public function create()
    {
        $positionModel = new \App\Models\Position();

        return view('employees/create', [
            'current_page' => 'employee',
            'positions' => $positionModel->findAll(),
        ]);
    }

    public function store()
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'fullname' => [
                'rules' => 'required|min_length[3]',
            ],
            'email' => [
                'rules' => 'required|min_length[3]'
            ],
            'username' => [
                'rules' => 'required|min_length[3]'
            ],
            'password_hash' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'The password field is required',
                    'min_length' => 'The password field must be at least 5 characters in length.'
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[10]'
            ],
            'position_id' => [
                'rules' => 'required'
            ]
        ]);

        if (!$validation) {

            $positions = new \App\Models\Position();

            return view('employees/create', [
                'validation' => $this->validator,
                'current_page' => 'employee',
                'positions' => $positions->findAll()
            ]);
        } else {
            $request = \Config\Services::request();
            $employeeModel = new \App\Models\UserModel();

            $data = [
                'fullname' => $request->getPost('fullname'),
                'email' => $request->getPost('email'),
                'username' => $request->getPost('username'),
                'password_hash' => $request->getPost('password_hash'),
                'phone' => $request->getPost('phone'),
                'position_id' => $request->getPost('position_id'),
            ];

            $employeeModel->insert($data);

            return redirect()->to(site_url('employee'))->with('success', 'Add employee Successfully');
        }
    }

    public function edit($id)
    {
        $employeeModel = new \App\Models\UserModel();
        $positionModel = new \App\Models\Position();

        return view('employees/edit', [
            'employee' => $employeeModel->find($id),
            'current_page' => 'employee',
            'positions' => $positionModel->findAll()
        ]);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'fullname' => [
                'rules' => 'required|min_length[3]',
            ],
            'email' => [
                'rules' => 'required|min_length[3]'
            ],
            'username' => [
                'rules' => 'required|min_length[3]'
            ],
            'password_hash' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'The password field is required',
                    'min_length' => 'The password field must be at least 5 characters in length.'
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[10]'
            ],
            'position_id' => [
                'rules' => 'required'
            ]
        ]);

        if (!$validation) {

            $positions = new \App\Models\Position();

            return view('employees/create', [
                'validation' => $this->validator,
                'current_page' => 'employee',
                'positions' => $positions->findAll()
            ]);
        } else {
            $request = \Config\Services::request();
            $employeeModel = new \App\Models\UserModel();

            $data = [
                'fullname' => $request->getPost('fullname'),
                'email' => $request->getPost('email'),
                'username' => $request->getPost('username'),
                'phone' => $request->getPost('phone'),
                'password_hash' => $request->getPost('password_hash'),
                'position_id' => $request->getPost('position_id'),
                'active' => 1,
            ];

            $employeeModel->update($id, $data);

            return redirect()->to(site_url('employee'))->with('success', 'Edit employee Successfully');
        }
    }

    public function delete($id)
    {
        $employeeModel = new \App\Models\UserModel();

        $employee = $employeeModel->find($id);

        if ($employee) {
            $employeeModel->delete($id);

            return redirect()->to(site_url('employee'))->with('success', 'Delete employee Successfully');
        }
    }
}
