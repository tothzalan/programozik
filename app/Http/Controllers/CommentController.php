<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
            'project_id'=>'required'
        ]);
   
        $input = $request->all();
        $input['project_id'] = $request->project_id;

        $comment = new Comment($input);
    
        // Comment::create($input);
        Auth::user()->comments()->save($comment);
        
        return back();
    }
}