<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    private $task_repository;

    public function __construct(
        TaskRepository $task_repository
    ){
        $this->task_repository = $task_repository;
    }

    public function createTask(array $params)
    {
        return $this->task_repository->createTask($params);
    }
}