<?php

namespace App\Services;

use App\Repositories\LikeRepository;

class LikeService
{
    private $like_repository;

    public function __construct(
        LikeRepository $like_repository
    ){
        $this->like_repository = $like_repository;
    }

    public function searchLikes(array $params = []){
        return $this->like_repository->searchLikes($params);
    }

    public function changeLikeStatus(array $params)
    {
        $like = $this->like_repository->searchLike($params);
    
        if($like){
            $this->like_repository->deleteLike($like->id);
        }else{
            $this->like_repository->createLike($params);
        }

        return true;
    }
}