<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectBrowserController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'projects' => Project::all(),
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $projects = Project::where('user_id', '<>', $user->id)
            ->with('owner')
            ->get();

        return view('dashboard', [
            'projects' => $projects,
        ]);
    }
}
