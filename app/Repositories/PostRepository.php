<?php
namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function __construct(
        Post $post
    ){
        $this->post = $post;
    }

    public function createPosts(array $params)
    {
        
        //親を作成
        $model = $this->post::create($params);

        //tags作成
        $model->tags()->createMany($params['tags']);
        
        return $model->get();
        
    }
    
    public function searchPosts(array $params = [])
    {
        $model = $this->post::with(['user', 'tags']);

        $total = $model->count();

        $data = $model
            ->forPage($params['page'] ?? 1, $params['limit'] ?? 50)
            ->get()
            ->toArray();
        
        //meta情報として, 合計の投稿数追加(pagination用)
        $data['meta'] = ['total' => $total];

        return $data;
    }

    public function deletePost(int $user_id, int $post_id)
    {
        
        $model = $this->post::with(['likes']);

        $model = $model->where('id', $post_id)
                       ->where('user_id', $user_id)
                       ->firstOrFail();

        $model->delete();

    }
}
