<?php
namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Requests\Task\StoreRequest;

class TaskController extends Controller
{
    private $task_service;
    
    public function __construct(TaskService $task_service)
    {
        $this->task_service = $task_service;
    }
    
    public function store(StoreRequest $request) 
    {

        $res = $this->task_service->createTask(
            $request->validated()
        );
        return response($res);
    }
}