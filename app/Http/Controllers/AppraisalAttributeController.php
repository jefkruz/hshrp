<?php

namespace App\Http\Controllers;

use App\Models\AppraisalAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class AppraisalAttributeController
 * @package App\Http\Controllers
 */
class AppraisalAttributeController extends Controller
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
        $data['page_title'] = 'Platform Settings';
        $data['attributes'] = AppraisalAttribute::all();
        return view('admin.platform', $data);
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
        $data['page_title'] = 'Platform Settings';
        $data['appraisalAttribute'] = new AppraisalAttribute();
        return view('appraisal-attribute.create', $data);
    }


    public function store(Request $request)
    {
        request()->validate(AppraisalAttribute::$rules);

        $appraisalAttribute = AppraisalAttribute::create($request->all());

        return redirect()->route('appraisal-attributes.index')
            ->with('message', 'AppraisalAttribute created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'View Attribute';
        $data['appraisalAttribute'] = AppraisalAttribute::find($id);
        return view('appraisal-attribute.show', $data);
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
        $data['page_title'] = 'Edit Attribute';
        $data['appraisalAttribute'] = AppraisalAttribute::find($id);

        return view('appraisal-attribute.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AppraisalAttribute $appraisalAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppraisalAttribute $appraisalAttribute)
    {
        request()->validate(AppraisalAttribute::$rules);

        $appraisalAttribute->update($request->all());

        return redirect()->route('appraisal-attributes.index')
            ->with('message', 'Attribute updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $appraisalAttribute = AppraisalAttribute::find($id)->delete();

        return redirect()->route('appraisal-attributes.index')
            ->with('message', 'AppraisalAttribute deleted successfully');
    }
}
