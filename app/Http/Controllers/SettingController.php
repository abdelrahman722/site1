<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
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
        return view('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'description1' =>'required',
            'description2' =>'required',
            'address' =>'required',
            'email' =>'required',
            'location' =>'required',
            'phone1' =>'required',
            'phone2' =>'required',
            'phone3' =>'required',
        ]);
        $data = $request->all();
        if ($request->img) {
            $imgname = $this->storeImg($request);
            $data['img'] = 'images/site/' . $imgname;
        }
        $setting = Setting::find(1);
        $setting->update($data);
        
        return back()->with('success', 'You have successfully update setting.'); 
    }

    public function storeImg($request)
    {
        $this->validate($request, ['img' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:8192']]);
        $imageName = 'SiteImg' . '.' . $request->img->extension();  
        $request->img->move(public_path('images/site/'), $imageName);
        return $imageName;
    }
}
