<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Setting;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::all();
        return view('service.index')->with(['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255|min:4',
            'description' => 'required',
            'icon' => 'required'
        ]);
        $request->merge(['status' => true]);
        Services::create($request->all());
        return back()->with('success', 'Service Was Created Successful.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $service)
    {
        $this->validate($request,[
            'title' => 'required|max:255|min:4',
            'description' => 'required'
        ]);
        $status = (boolean)$request->status;
        $request->merge(['status' => $status]);
        $service->update($request->all());
        return back()->with('success', 'Service his Updated Successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Service = Services::find($request->id);
        $Service->delete();
        return back()->with('success', 'Service Was Deleted Successful.');
    }
}
