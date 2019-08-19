<?php
namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $githubId = $request->session()->get('username');
        $currentUser = User::where('github_id', $githubId)->firstOrFail()->toArray();
        $currentUserId = $currentUser["id"];
        $posts = Post::where('user_id', $currentUserId)->get();
        return view('index', ['posts'=>$posts]);
    }
}