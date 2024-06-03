<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    public function fetchMenu()
    {
        $route = Route::currentRouteName();
        if(session('staff')){
            return $this->staffMenu($route, session('staff')->is_leader);
        } else if(session('admin')){
            return $this->adminMenu($route);
        } else if(session('director')){
            return $this->directorMenu($route);
        } else {
            return [];
        }
    }

    private function adminMenu($route)
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => 'admin.index',
                'icon' => 'la la-dashboard',
                'active' => $route == 'admin.index' ? 'active' : ''
            ],
            [
                'name' => 'Sub Departments',
                'route' => 'admin.subDepartments',
                'icon' => 'la la-building',
                'active' => $route == 'admin.subDepartments' ? 'active' : ''
            ],
            [
                'name' => 'Units',
                'route' => 'admin.departments',
                'icon' => 'la la-building',
                'active' => $route == 'admin.departments' ? 'active' : ''
            ],
            [
                'name' => 'Staff',
                'route' => 'admin.staff',
                'icon' => 'la la-users',
                'active' => $route == 'admin.staff' ? 'active' : ''
            ],
            [
                'name' => 'Director',
                'route' => 'admin.director',
                'icon' => 'la la-user-shield',
                'active' => $route == 'admin.director' ? 'active' : ''
            ],
            [
                'name' => 'Projects',
                'route' => 'admin.projects',
                'icon' => 'la la-rocket',
                'active' => $route == 'admin.projects' ? 'active' : ''
            ],
            [
                'name' => 'Appraisal Attributes',
                'route' => 'admin.appraisal',
                'icon' => 'la la-graduation-cap',
                'active' => $route == 'admin.appraisal' ? 'active' : ''
            ],
            [
                'name' => 'Grade Reports',
                'route' => 'admin.report',
                'icon' => 'la la-graduation-cap',
                'active' => $route == 'admin.report' ? 'active' : ''
            ],
        ];
    }

    private function directorMenu($route)
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => 'director.index',
                'icon' => 'la la-dashboard',
                'active' => $route == 'director.index' ? 'active' : ''
            ],
            [
                'name' => 'Units',
                'route' => 'director.departments',
                'icon' => 'la la-building',
                'active' => $route == 'director.departments' ? 'active' : ''
            ],
            [
                'name' => 'Staff',
                'route' => 'director.staff',
                'icon' => 'la la-users',
                'active' => $route == 'director.staff' ? 'active' : ''
            ],
            [
                'name' => 'Projects',
                'route' => 'director.projects',
                'icon' => 'la la-rocket',
                'active' => $route == 'director.projects' ? 'active' : ''
            ],
        ];
    }

    private function staffMenu($route, $is_leader)
    {
        $leaderMenu = [
            [
                'name' => 'My Team',
                'route' => 'leaderTeam',
                'icon' => 'la la-users',
                'active' => $route == 'leaderTeam' ? 'active' : ''
            ],
        ];
        $menu = [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'la la-dashboard',
                'active' => $route == 'dashboard' ? 'active' : ''
            ],
            [
                'name' => 'Projects',
                'route' => 'projects',
                'icon' => 'la la-rocket',
                'active' => $route == 'projects' ? 'active' : ''
            ],
            [
                'name' => 'Goals/Reports',
                'route' => 'goals',
                'icon' => 'la la-crosshairs',
                'active' => $route == 'goals' ? 'active' : ''
            ],
            [
                'name' => 'Appraisals',
                'route' => 'appraisals',
                'icon' => 'la la-graduation-cap',
                'active' => $route == 'appraisals' ? 'active' : ''
            ],
        ];

        if($is_leader == 'yes'){
            foreach($leaderMenu as $item){
                array_push($menu, $item);
            }
        }

        return $menu;
    }
}
