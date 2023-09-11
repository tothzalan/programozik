<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upvote;
use Illuminate\Support\Facades\Auth;

class UpvoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required'
        ]);

        $input = $request->all();
        $input['post_id'] = $request->post_id;

        $upvote = new Upvote($input);

        // Comment::create($input);
        Auth::user()->upvotes()->save($upvote);

        return back();
    }

    public function destroy($post_id, $user_id)
    {
        $upvote = Upvote::where('post_id', $post_id)->where('user_id', $user_id)->firstOrFail();
        $upvote->delete();

        return redirect()->back();
    }
}
