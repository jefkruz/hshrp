<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        $m = new MenuController();
        $d = new DashboardController();
        $data['cards'] = $d->adminDashboardCard();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }
}
