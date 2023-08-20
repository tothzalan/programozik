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
        return view('dashboard', [
            'projects' => Project::where('user_id', '<>', $user->id)->get(),
        ]);
    }
}
