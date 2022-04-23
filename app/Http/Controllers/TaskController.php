<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Get all tasks
     */
    public function index()
    {
        $tasks = Task::allWithChildren();

        return TaskResource::collection($tasks);
    }

    /**
     * Show specific task for the given id, with only his children
     */
    public function show(int $id)
    {
        $task = Task::findOrFail($id);

        return new TaskResource($task);
    }

    /**
     * Show specific task for the given id, with all children
     */
    public function showWithAllChildren(int $id)
    {
        $tasks = Task::findOrFail($id)->allChildren();

        return TaskResource::collection($tasks);
    }
}
