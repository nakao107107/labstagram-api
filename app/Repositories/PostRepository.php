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

    public function createPosts(array $params)
    {

        $model = $this->post::create($params);
        return $model->get();
        
    }
    
    public function searchPosts()
    {
        $model = $this->post::with(['user']);

        $total = $model->count();

        $data = $model
            ->get()
            ->toArray();
        
        //meta情報として, 合計の投稿数追加(pagination用)
        $data['meta'] = ['total' => $total];

        return $data;
    }

    public function deletePost(int $user_id, int $post_id){
        
        $model = $this->post::with(['likes']);

        $model = $model->where('id', $post_id)
                       ->where('user_id', $user_id)
                       ->firstOrFail();

        $model->delete();

    }
}
