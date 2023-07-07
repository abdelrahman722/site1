<?php

namespace App\Http\Controllers;

use App\Models\Ask;
use App\Models\Client;
use App\Models\Project;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{

    public $projects;
    public $asks;
    public $clients;
    public $services;
    public $team;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->projects = Project::all();
        $this->asks = Ask::all();
        $this->clients = Client::all();
        $this->services = Services::all();
        $this->team = Team::all();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome')->with([
            'projects' => $this->projects,
            'setting' => $this->setting,
            'asks' => $this->asks,
            'clients' => $this->clients,
            'services' => $this->services,
            'team' => $this->team,
        ]);
    }

    public function project(Project $project)
    {
        return view('project')->with([
            'project' => $project,
            'setting' => $this->setting,
            'services' => $this->services,
        ]);
    }

}
