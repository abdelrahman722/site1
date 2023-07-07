<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('user.type')->only(['store', 'update', 'destroy']);
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
     * Display a listing of the resource.
     */
    public function profile()
    {
        return view('admin.profile');
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
        $this->validate($request,[
            'password' => 'required|confirmed|min:6'
        ]);
        $admin->update(['password' => bcrypt($request->password)]);
        return back()->with('success', 'Admin Password his Updated Successful.');
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request)
    {
        $user = admin::find(auth()->user()->id);
        $data = array();
        $valarr = [
            'name' => 'required|max:255|min:4',
            'email' => ['required', 'email', Rule::unique('admins')->ignore($user->id)],
        ];
        if ($request->password) {
            $valarr = ['password' => 'required|confirmed|min:6'];
            $data['password'] = bcrypt($request->password);
        }
        $this->validate($request, $valarr);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $user->update($data);
        return back()->with('success', 'Admin Info his Updated Successful.');
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
