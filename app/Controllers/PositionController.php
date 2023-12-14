<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PositionController extends BaseController
{
    public function index()
    {
        $positionModel = new \App\Models\Position();
        $pager = \Config\Services::pager();

        $data = [
            'positions' => $positionModel->paginate(10, 'position'),
            'pager' => $pager,
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
            $positionModel = new \App\Models\Position();

            $data = [
                'name' => $request->getPost('position')
            ];

            $positionModel->insert($data);

            return redirect()->to(site_url('position'))->with('success', 'Add Position Successfully');
        }
    }

    public function edit($id)
    {
        $positionModel = new \App\Models\Position();

        return view('positions/edit', [
            'position' => $positionModel->find($id),
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
            $positionModel = new \App\Models\Position();

            $data = [
                'name' => $request->getPost('position')
            ];

            $positionModel->update($id, $data);

            return redirect()->to(site_url('position'))->with('success', 'Edit Position Successfully');
        }
    }

    public function delete($id)
    {
        $positionModel = new \App\Models\Position();

        $position = $positionModel->find($id);

        if ($position) {
            $positionModel->delete($id);

            return redirect()->to(site_url('position'))->with('success', 'Delete Position Successfully');
        }
    }
}
