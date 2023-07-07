<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Setting;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $clients = Client::all();
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255|min:4',
            'img' => 'image|mimes:jpg,png,jpeg,gif,svg|max:8192'
        ]);

        $iName = $this->storeimg($request);
        $requestData = $request->all();
        $requestData['img'] = $iName;
        $requestData['status'] = true;
        Client::create($requestData);
        return back()->with('success', 'Client Was Created Successful.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request,[
            'title' => 'required|max:255|min:4',
        ]);
        $status = (boolean)$request->status;
        $request->merge(['status' => $status]);
        $data = $request->all();
        if ($request->img) {
            $imgname = $this->storeImg($request, $client->id);
            $data['img'] = $imgname;
        }
        $client->update($data);
        return back()->with('success', 'Client his Updated Successful.');
    }    

    public function storeImg($request, $id = false)
    {
        if(!$id){
            $lastId = Client::latest()->first()->id;
            $id = (int) $lastId + 1;
        }
        $imageName = 'ClientImg' . (string)$id . '.' . $request->img->extension();  
        $request->img->move(public_path('images/client/'), $imageName);
        $imageName = 'images/client/' . $imageName;
        return $imageName;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Client = Client::find($request->id);
        $this->removeImg($Client);
        $Client->delete();
        return back()->with('success', 'Client Was Deleted Successful.');
    }

    public function removeImg(Client $Client)
    {
        $imgPath = public_path($Client->img);
        $imgPath = str_replace('/', '\\', $imgPath);
        @unlink($imgPath);
    }
}
