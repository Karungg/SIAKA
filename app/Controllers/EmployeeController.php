<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Password;

class EmployeeController extends BaseController
{
    protected $employeeModel, $positionModel;

    public function __construct()
    {
        $this->employeeModel = new \Myth\Auth\Models\UserModel();
        $this->positionModel = new \App\Models\Position();
    }
    public function index()
    {
        $data = [
            'pager' => \Config\Services::pager(),
            'current_page' => 'employee',
            'users' => $this->employeeModel->findAll(),
        ];

        return view('employees/index', $data);
    }

    public function create()
    {
        return view('employees/create', [
            'current_page' => 'employee',
            'positions' => $this->positionModel->findAll(),
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
            return view('employees/create', [
                'validation' => $this->validator,
                'current_page' => 'employee',
                'positions' => $this->positionModel->findAll()
            ]);
        } else {
            $request = \Config\Services::request();
            $data = [
                'fullname' => $request->getPost('fullname'),
                'email' => $request->getPost('email'),
                'username' => $request->getPost('username'),
                'password_hash' => Password::hash($request->getPost('password_hash')),
                'phone' => $request->getPost('phone'),
                'position_id' => $request->getPost('position_id'),
            ];

            $this->employeeModel->insert($data);

            return redirect()->to(site_url('employee'))->with('success', 'Add employee Successfully');
        }
    }

    public function edit($id)
    {
        return view('employees/edit', [
            'employee' => $this->employeeModel->find($id),
            'current_page' => 'employee',
            'positions' => $this->positionModel->findAll()
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
            return view('employees/create', [
                'validation' => $this->validator,
                'current_page' => 'employee',
                'positions' => $this->positionModel->findAll()
            ]);
        } else {
            $request = \Config\Services::request();
            $data = [
                'fullname' => $request->getPost('fullname'),
                'email' => $request->getPost('email'),
                'username' => $request->getPost('username'),
                'password_hash' => Password::hash($request->getPost('password_hash')),
                'phone' => $request->getPost('phone'),
                'position_id' => $request->getPost('position_id'),
            ];

            $this->employeeModel->update($id, $data);

            return redirect()->to(site_url('employee'))->with('success', 'Edit employee Successfully');
        }
    }

    public function delete($id)
    {
        $employee = $this->employeeModel->find($id);

        if ($employee) {
            $this->employeeModel->delete($id);

            return redirect()->to(site_url('employee'))->with('success', 'Delete employee Successfully');
        }
    }
}
