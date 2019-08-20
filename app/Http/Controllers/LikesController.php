<?php
namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(Request $request)
    {

        $posts = Post::all();
        return view('index', ['posts'=>$posts]);
    }

}