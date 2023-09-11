<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Project;
use App\Services\MarkdownConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    protected $markdownConverter;

    public function __construct(MarkdownConverter $markdownConverter)
    {
        $this->markdownConverter = $markdownConverter;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Auth::user()->projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: validate link
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable'],
            'link' => ['nullable'],
        ]);

        $project = new Project($validated);

        Auth::user()->projects()->save($project);

        // TODO: add with() method
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->description = $this->markdownConverter->convertToHtml($project->description);

        if(Auth::check())
        {
            $isOwner = $project->owner == Auth::user();
            $pending = Member::where('user_id', Auth::user()->id)->where('project_id', $project->id)->exists();
            $member = Member::where('user_id', Auth::user()->id)->where('valid', true)->where('project_id', $project->id)->exists();
            return view('projects.show', [
                'project' => $project,
                'owner' => $isOwner,
                'pending' => !$isOwner &&  $pending,
                'member' => $member,
            ]);
        }


        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable'],
            'link' => ['nullable'],
        ]);

        $project->update($validated);

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        // TODO: add with() method
        return redirect('/projects');
    }

    public function addMember(Project $project, Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $project->members()->attach($validated['user_id']);

        return redirect()->back();
    }

    public function removeMember(Project $project, Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $project->members()->detach($validated['user_id']);

        return redirect()->back();
    }

    public function addPost(Project $project, Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $project->posts()->create($validated);

        return redirect()->back();
    }

    public function removePost(Project $project, Request $request)
    {
        $validated = $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        $project->posts()->find($validated['post_id'])->delete();

        return redirect()->back();
    }
}
