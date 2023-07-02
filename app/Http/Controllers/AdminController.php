<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except(['signin', 'checkSignin']);
    }
    
    /**
     * login page
     *
     * @return void
     */
    public function signin()
    {
        return view('login');
    }

    public function checkSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/dashboard');
        }

        return back()->withInput($request->only('email'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = admin::all();
        $setting = Setting::find(1);
        return view('admin.index')->with(['admins' => $admins, 'setting' => $setting]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255|min:4',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|confirmed|min:6'
        ]);

        admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => false
        ]);
        return back()->with('success', 'Admin Was Created Successful.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        if (auth()->user()->role !== 1) {
            return back()->with('error', 'Admin can\'t be Edit All Password.');
        }
        $this->validate($request,[
            'password' => 'required|confirmed|min:6'
        ]);
        $admin->update(['password' => bcrypt($request->password)]);
        return back()->with('success', 'Admin Password his Updated Successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $admin = admin::find($request->id);
        if ($admin->role == 1) {
            return back()->with('error', 'Super Admin can\'t be Deleted.');
        }
        $admin->delete();
        return back()->with('success', 'Admin Was Deleted Successful.');
    }
    
}
