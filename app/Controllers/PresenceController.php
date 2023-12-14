<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PresenceController extends BaseController
{
    public function index()
    {
        return view('presences/index', [
            'current_page' => 'presence'
        ]);
    }
}
