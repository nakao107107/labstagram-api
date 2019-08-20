<?php
namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    public function __construct(
        User $user
    )

    {
        $this->user = $user;
    }

    public function getUserById($user_id)
    {
        $model = $this->user::with(['posts']);
        $data = $model
            ->where('id', $user_id)
            ->firstOrFail()
            ->toArray();
        return $data;
    }
}