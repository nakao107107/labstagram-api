<?php
namespace App\Http\Controllers;
use App\Services\LikeService;
use App\Requests\Like\StoreRequest;

use Illuminate\Http\Request;

class LikeController extends Controller
{

    private $like_service;
    
    public function __construct(LikeService $like_service)
    {
        $this->like_service = $like_service;
    }

    public function store(StoreRequest $request)
    {
        $res = $this->like_service->changeLikeStatus(
            $request->validated()
        );
        return response('');
    }

}