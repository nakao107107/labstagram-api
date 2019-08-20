<?php
namespace App\Repositories;
use App\Models\Post;
use App\Entities\PostEntity;
use App\Utilities\EntityMapper;

class PostRepository
{
    public function __construct(
        Post $post
    )

    {
        $this->post = $post;
    }
    public function searchPosts()
    {
        $model = $this->post::with(['user']);
        $data = $model
            ->get()
            ->toArray();
        return $data;
    }
}
