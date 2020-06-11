<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function create(Request $request){
        $user = Auth::user();
        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => $user->id,
            'post_id' => $request->post_id
        ]);
        $view = view('comment.list_comment', compact('comment'))->render();
        return response()->json([
            'view' => $view
        ]);
    }

    public function update(Request $request){
        $comment = Comment::find($request->id);
        $comment->update([
            'content' => $request->content
        ]);
        return $comment->content;
    }

    public function destroy(Request $request){
        $comment = Comment::find($request->id);
        $comment->delete();
    }
}
