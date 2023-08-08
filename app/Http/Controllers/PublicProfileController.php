<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function index(string $name) {
        $user = User::where('name', $name)->first();
        if(!$user)
            return abort(404, 'User not found!');
        $projects = $user->projects;
        return view('profile.index', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }
}
