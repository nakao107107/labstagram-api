<?php
namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {

        $posts = Post::all();
        return view('index', ['posts'=>$posts]);
    }

    public function new(Request $request)
    {
        return view('new');
    }

    // 投稿された内容を表示するページ
    public function create(Request $request) {

        $githubId = $request->session()->get('username');
        $currentUser = User::where('github_id', $githubId)->firstOrFail()->toArray();
        $currentUserId = $currentUser["id"];

        // 投稿内容の受け取って変数に入れる
        $caption = $request->input('caption');
        $img_url = $request->input('img_url');
        Post::insert(["caption" => $caption, "img_url" => $img_url, 'user_id'=>$currentUserId]);
        return redirect('/');
    }

    public function profile(Request $request)
    {
        $githubId = $request->session()->get('username');
        $currentUser = User::where('github_id', $githubId)->firstOrFail();
        $currentUserId = $currentUser["id"];
        $posts = Post::where('user_id', $currentUserId)->get();
        return view('profile', ['posts'=>$posts, 'user' => $currentUser]);
    }
}