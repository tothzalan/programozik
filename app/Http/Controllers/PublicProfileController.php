<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function index(string $name) {
        $user = User::where('name', $name)->first();
        // TODO: return something nice if the user does not exists
        $projects = $user->projects;
        return view('profile.index', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }
}
