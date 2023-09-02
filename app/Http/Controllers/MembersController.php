<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class MembersController extends Controller
{
    public function join(Request $request, int $projectId)
    {
        $joined = Auth::user()->members;
        foreach($joined as $j)
        {
            if($j->project_id == $projectId)
                return Redirect::route('projects.show', $projectId);
        }
        
        $membership = new Member(['project_id' => $projectId, 'user_id' => Auth::user()->id, 'valid' => false]);
        $membership->save();

        return Redirect::route('projects.show', $projectId);
    }

    public function manage(Request $request, int $projectId)
    {
        $project = Project::find($projectId);
        $members = Member::where('project_id', $projectId)->with('user')->get();

        return view('manage.members', [
            'owner' => $project->owner,
            'members' => $members,
        ]);
    }

    public function accept(Member $member)
    {
        $member->valid = true;
        $member->save();

        return Redirect::route('members.manage', $member->project_id);
    }

    public function deny(Member $member)
    {
        $member->delete();
        return Redirect::route('members.manage', $member->project_id);
    }
}
