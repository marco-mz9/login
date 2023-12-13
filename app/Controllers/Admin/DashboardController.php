<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index(): string
    {
        $session = session();
        return view('Layout/Admin/header').view('Layout/Admin/aside').view('Admin/inicio').view('Layout/Admin/modal').view('Layout/Admin/footer');
    }
}