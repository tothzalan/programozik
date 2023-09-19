<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mailgun\Mailgun;
use Exception;
use Illuminate\Support\Facades\Log;

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

        $project = Project::find($projectId);
        

        try {
            $mg = Mailgun::create(env('MAILGUN_KEY'));

            $mg->messages()->send(env('MAILGUN_DOMAIN'), [
                'from' => 'no-reply@' . env('MAILGUN_DOMAIN'),
                'to' => $project->owner->email,
                'subject' => 'New join request from ' . Auth::user()->name . ' in ' . $project->name . '!',
                'text' => 'You have received a new join request from ' . Auth::user()->name . ' in project ' . $project->name,
            ]);

        } catch(Exception $exception) {
            Log::error('Set up correct environmental variables to use Mailgun');
        }

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
