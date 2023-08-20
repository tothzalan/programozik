<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectBrowserController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'projects' => Project::all(),
        ]);
    }
}
