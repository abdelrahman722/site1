<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
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
        $projects = Project::all();
        return view('project.index',)->with('projects', $projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255|min:4',
            'url' => 'required',
            'img' => 'image|mimes:jpg,png,jpeg,gif,svg|max:8192',
            'description' => 'required'
        ]);
        $iName = $this->storeimg($request); // iname name of img + path

        $requestData = $request->all(); // all of filed of request

        $requestData['img'] = $iName;
        
        $requestData['status'] = 'on';
        dd($requestData);

        project::create($requestData);
        return back()->with('success', 'Project Was Created Successful.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request,[
            'title' => 'required|max:255|min:4',
            'url' => 'required',
            'description' => 'required'
        ]);
        $data = $request->all();
        if ($request->img) {
            $imgname = $this->storeImg($request, $project->id);
            $data['img'] = $imgname;
        }
        $project->update($data);
        return back()->with('success', 'project his Updated Successful.');
    }    
    
    /**
     * storeImg
     * store img and return path of img
     * @param  mixed $request
     * @param  mixed $id
     * @return string
     */
    public function storeImg($request, $id = false)
    {
        if(!$id){
            $lastId = Project::latest()->first()->id;
            $id = (int) $lastId + 1;
        }
        $imageName = 'ProjectImg' . (string)$id . '.' . $request->img->extension();  
        $request->img->move(public_path('images/project/'), $imageName);
        $imageName = 'images/project/' . $imageName;
        return $imageName;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Project = Project::find($request->id);
        $this->removeImg($Project);
        $Project->delete();
        return back()->with('success', 'Project Was Deleted Successful.');
    }

    public function removeImg(Project $project)
    {
        $imgPath = public_path($project->img);
        $imgPath = str_replace('/', '\\', $imgPath);
        @unlink($imgPath);
    }
}
