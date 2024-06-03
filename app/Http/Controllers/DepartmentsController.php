<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $deptExists = Department::whereName($request->name)->exists();
        if($deptExists){
            return back()->with('error', 'Department exists already');
        }

        $dept = new Department();
        $dept->name = $request->name;
        $dept->sub_id = $request->sub_id;
        $dept->save();
        return back()->with('message', 'Department created');
    }

    public function assignUnitHead($id, Request $request)
    {
        $request->validate([
            'leader_id' => 'required'
        ]);

        $dept = Department::findOrFail($id);

        $dept->leader_id = $request->leader_id;
        $dept->status = 'assigned';
        $dept->save();

        $staff = Staff::findOrFail($request->leader_id);
        $staff->is_leader = 'yes';
        $staff->save();

        return back()->with('message', 'Unit head assigned');
    }
}
