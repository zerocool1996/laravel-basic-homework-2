<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function create(PostRequest $postRequest){
        Post::create([
            'title'     => $postRequest->title,
            'content'   => $postRequest->content,
            'user_id'   => Auth::user()->id
        ]);
        return redirect()->back()->with('success_msg', 'Đăng bài viết thành công !');
    }

    public function index(){
        $posts = Post::with('postUser')->paginate(15);
        return view('index', compact('posts'));
    }

    public function detail($id){
        $post = Post::where('id', $id)->with('postComment')->first();
        return view('post.detail', compact('post'));
    }
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('index')->with('success_msg', 'Xóa bài viết thành công !');
    }

    public function update(UpdatePostRequest $updatePostRequest, $id){
        $post = Post::find($id);
        $post->update([
            'title'     => $updatePostRequest->edittitle,
            'content'   => $updatePostRequest->editcontent
        ]);
        return redirect()->back();
    }
}
