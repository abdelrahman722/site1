<?php

namespace App\Http\Controllers;

use App\Models\Ask;
use App\Models\Setting;
use Illuminate\Http\Request;

class AskController extends Controller
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
        $asks = Ask::all();
        return view('ask.index')->with(['asks' => $asks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'qu' => 'required|min:4',
            'an' => 'required|min:4'
        ]);
        $request->merge(['status' => true]);
        Ask::create($request->all());
        return back()->with('success', 'Ask Was Created Successful.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ask $ask)
    {
        $this->validate($request,[
            'qu' => 'required|min:4',
            'an' => 'required|min:4'
        ]);
        $status = (boolean)$request->status;
        $request->merge(['status' => $status]);
        $ask->update($request->all());
        return back()->with('success', 'Ask his Updated Successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ask = Ask::find($request->id);
        $ask->delete();
        return back()->with('ask', 'Project Was Deleted Successful.');
    }
}
