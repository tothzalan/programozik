<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show to form for creating a new resource
     */
    public function create(int $project_id)
    {
        return view('issue.create', [
            'project_id' => $project_id
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $project_id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable'],
            'url' => ['required'],
            'price' => ['nullable'],
        ]);

        $validated['project_id'] = $project_id;
        $issue = new Issue($validated);
        $issue->save();

        return redirect('/projects/' . $project_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return view('issue.show', [
            'issue' => $issue,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
