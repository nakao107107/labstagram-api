<?php
namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function __construct(
        Task $task
    ){
        $this->task = $task;
    }

    public function createTask(array $params)
    {
        $model = $this->task::firstOrCreate($params);
        return $model->get();
        
    }

}
