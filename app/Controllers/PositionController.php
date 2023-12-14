<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PositionController extends BaseController
{
    protected $positionModel;

    public function __construct()
    {
        $this->positionModel = new \App\Models\Position();
    }

    public function index()
    {
        $data = [
            'positions' => $this->positionModel->paginate(10, 'position'),
            'pager' => \Config\Services::pager(),
            'current_page' => 'position'
        ];

        return view('positions/index', $data);
    }

    public function create()
    {
        return view('positions/create', [
            'current_page' => 'position'
        ]);
    }

    public function store()
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'position' => [
                'rules' => 'required|min_length[3]',
            ]
        ]);

        if (!$validation) {
            return view('positions/create', [
                'validation' => $this->validator,
                'current_page' => 'position'
            ]);
        } else {
            $request = \Config\Services::request();
            $data = [
                'name' => $request->getPost('position')
            ];

            $this->positionModel->insert($data);

            return redirect()->to(site_url('position'))->with('success', 'Add Position Successfully');
        }
    }

    public function edit($id)
    {
        return view('positions/edit', [
            'position' => $this->positionModel->find($id),
            'current_page' => 'position'
        ]);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'position' => [
                'rules' => 'required|min_length[3]',
            ]
        ]);

        if (!$validation) {
            return view('positions/create', [
                'validation' => $this->validator,
                'current_page' => 'position'
            ]);
        } else {
            $request = \Config\Services::request();
            $data = [
                'name' => $request->getPost('position')
            ];

            $this->positionModel->update($id, $data);

            return redirect()->to(site_url('position'))->with('success', 'Edit Position Successfully');
        }
    }

    public function delete($id)
    {
        $position = $this->positionModel->find($id);

        if ($position) {
            $this->positionModel->delete($id);

            return redirect()->to(site_url('position'))->with('success', 'Delete Position Successfully');
        }
    }
}
