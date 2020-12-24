<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard ()
    {
        $this->view('home');

        return $this->render();
    }
}
