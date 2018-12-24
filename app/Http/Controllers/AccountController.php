<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class AccountController extends Controller
{
    public function __construct()
    {
        // makes sure that only logged in users can access
        $this->middleware('auth');
    }

    public function index() {
        $projectsTotal = Project::all()->count();

        return view('account/dashboard', compact('projectsTotal'));
    }
}


