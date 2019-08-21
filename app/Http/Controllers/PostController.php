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

        // formから送信されたimgファイルを読み込む
        $file = $request->file('file');

        $file_contents = file_get_contents($file->getRealPath());

        // s3のuploadsファイルに追加
        $path = Storage::disk('minio')->put("aaa.jpg", $file_contents, 'public');
        // 画像のURLを参照
        // $url = Storage::disk('s3')->url($filename);
        // var_dump($url);
        $res = $this->post_service->createPosts(
            $request->validated()
        );
        return response($res);
    }
    
}