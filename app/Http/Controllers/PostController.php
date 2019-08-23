<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests\Post\StoreRequest;
use App\Requests\Post\DeleteRequest;

use App\Services\PostService;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    private $post_service;
    
    public function __construct(PostService $post_service)
    {
        $this->post_service = $post_service;
    }

    public function index(Request $request)
    {

        $res = $this->post_service->searchPosts(
            $request->query()
        );

        $total = $res['meta']['total'];
        unset($res['meta']);

        return response($res)->header('X-Total-Count', $total);

    }

    public function store(StoreRequest $request) 
    {

        $res = $this->post_service->createPosts(
            $request->validated()
        );
        return response($res);
    }

    public function delete(DeleteRequest $request)
    {
        $res = $this->post_service->deletePost(
            $request->input('user_id'),
            $request->route('post_id')
        );
        return response('');
    }
    
}