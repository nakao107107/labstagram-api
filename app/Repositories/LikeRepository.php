<?php
namespace App\Repositories;
use App\Models\Like;

class LikeRepository
{
    public function __construct(
        Like $like
    ){
        $this->like = $like;
    }

    public function searchLike(array $params)
    {
        $model = $this->like;
        $model = $model->where('post_id', $params['post_id']);
        $model = $model->where('user_id', $params['user_id']);
        
        $data = $model->first();

        if($data){
            return $data;
        }else{
            return [];
        }

        
    }
    
    public function createLike(array $params)
    {
        $model = $this->like::create($params);
        return $model->get();
    }

    public function deleteLike(int $item_id)
    {
        $model = $this->like::where('id', $item_id);
        $model = $model->firstOrFail();
        return $model->delete();
    }

    public function searchLikes()
    {
        $model = $this->like::with(['user']);
        $data = $model
            ->get()
            ->toArray();
        return $data;
    }
}
