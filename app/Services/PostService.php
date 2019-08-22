<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    private $post_repository;

    public function __construct(
        PostRepository $post_repository
    ){
        $this->post_repository = $post_repository;
    }

    public function createPosts(array $params)
    {
        return $this->post_repository->createPosts($params);
    }

    public function searchPosts(array $params=[])
    {
        return $this->post_repository->searchPosts($params);
    }

    public function deletePost(int $user_id, int $post_id)
    {
        $res = $this->post_repository->deletePost($user_id, $post_id);
        return $res;
    }
}