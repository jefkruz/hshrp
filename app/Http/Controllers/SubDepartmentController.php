<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\SubDepartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class SubDepartmentController
 * @package App\Http\Controllers
 */
class SubDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Sub Departments';
        $data['subs'] = SubDepartment::all();
        return view('admin.sub-department', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Sub Department';
        $data['subDepartment'] = new SubDepartment();
        $data['staffs'] = Staff::all();
        return view('sub-department.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hod_id' => 'required',
            'name' => 'required',
        ]);

        $dept = new SubDepartment();
        $dept->name = $request->name;
        $dept->hod_id = $request->hod_id;

        $dept->save();
        $staff = Staff::findOrFail($request->hod_id);
        $staff->is_hod = 'yes';
        $staff->save();

        return redirect()->route('sub-departments.index')
            ->with('message', 'SubDepartment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subDepartment = SubDepartment::find($id);

        return view('sub-department.show', compact('subDepartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['staffs'] = Staff::all();
        $data['page_title'] = 'Edit Sub Department';
        $data['subDepartment'] = SubDepartment::find($id);

        return view('sub-department.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SubDepartment $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDepartment $subDepartment)
    {
        $request->validate([
            'hod_id' => 'required',
            'name' => 'required',
        ]);


        $dept = SubDepartment::where('id', $subDepartment->id)->first();
        $dept->name = $request->name;
        $dept->hod_id = $request->hod_id;

        $dept->save();

        $staff = Staff::where('id',$subDepartment->hod_id)->first();
        $staff->is_hod = 'no';
        $staff->save();

        $staff = Staff::where('id',$request->hod_id)->first();
        $staff->is_hod = 'yes';
        $staff->save();

        return redirect()->route('sub-departments.index')
            ->with('message', 'SubDepartment updated successfully');
    }

    public function assignDeptHead($id, Request $request)
    {
        $request->validate([
            'leader_id' => 'required'
        ]);

        $dept = SubDepartment::findOrFail($id);

        $dept->leader_id = $request->leader_id;
        $dept->status = 'assigned';
        $dept->save();

        $staff = Staff::findOrFail($request->leader_id);
        $staff->is_leader = 'yes';
        $staff->save();

        return back()->with('message', 'Unit head assigned');
    }
    public function destroy($id)
    {
        $subDepartment = SubDepartment::find($id)->delete();

        return redirect()->route('sub-departments.index')
            ->with('success', 'SubDepartment deleted successfully');
    }
}
