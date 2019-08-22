<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use App\Requests\Post\StoreRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostController extends Controller
{

    private $post_service;
    
    public function __construct(PostService $post_service)
    {
        $this->post_service = $post_service;
    }

    public function index(){

        $res = $this->post_service->searchPosts();
        return response($res);

    }

    public function store(StoreRequest $request) {

        $res = $this->post_service->createPosts(
            $request->validated()
        );
        return response($res);
    }
    
}