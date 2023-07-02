<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $team = Team::all();
        $setting = Setting::find(1);
        return view('team.index')->with(['team' => $team, 'setting' => $setting]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255|min:4',
            'title' => 'required|max:255|min:4',
            'description' => 'required',
            'img' => 'image|mimes:jpg,png,jpeg,gif,svg|max:8192'
        ]);

        $iName = $this->storeimg($request);
        $requestData = $request->all();
        $requestData['img'] = $iName;
        $requestData['status'] = true;
        Team::create($requestData);
        return back()->with('success', 'Team Was Created Successful.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request,[
            'name' => 'required|max:255|min:4',
            'title' => 'required|max:255|min:4',
            'description' => 'required'
        ]);
        if ($request->img) {
            $imgname = $this->storeImg($request, $team->id);
        }else{
            $request->offsetUnset('img');
        }
        $status = (boolean)$request->status;
        $request->merge(['status' => $status]);
        $data = $request->all();
        $data['img'] = $imgname;
        $team->update($data);
        return back()->with('success', 'Team his Updated Successful.');
    }    

    public function storeImg($request, $id = false)
    {
        if(!$id){
            $lastId = Team::latest()->first()->id;
            $id = (int) $lastId + 1;
        }
        $imageName = 'TeamImg' . (string)$id . '.' . $request->img->extension();  
        $request->img->move(public_path('images/team/'), $imageName);
        $imageName = 'images/team/' . $imageName;
        return $imageName;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Team = Team::find($request->id);
        $this->removeImg($Team);
        $Team->delete();
        return back()->with('success', 'Team Was Deleted Successful.');
    }

    public function removeImg(Team $Team)
    {
        $imgPath = public_path($Team->img);
        $imgPath = str_replace('/', '\\', $imgPath);
        @unlink($imgPath);
    }
}
