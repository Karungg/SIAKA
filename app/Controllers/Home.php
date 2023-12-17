<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function history()
    {
        return view('history/index', [
            'current_page' => 'history'
        ]);
    }
}
