<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tasks;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Save a task.
     */
    public function store(TaskRequest $request): JsonResponse
    {
        $task = Tasks::create($request->validated());
        return response()->json($task, 201);
    }

    /**
     * Retrieve all tasks.
     */
    public function index(): JsonResponse
    {
        $tasks = Tasks::all(['id', 'title', 'description']);
        return response()->json($tasks, 200);
    }

    /**
     * Retrieve a specific task by ID.
     */
    public function show($id): JsonResponse
    {
        TaskRequest::validateTaskId($id);

        $task = Tasks::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found.',
            ], 404);
        }

        return response()->json($task, 200);
    }

    /**
     * Update a task by ID.
     */
    public function update(TaskRequest $request, $id): JsonResponse
    {
        TaskRequest::validateTaskId($id);

        $task = Tasks::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found.',
            ], 404);
        }

        $task->update($request->validated());

        return response()->json($task, 200);
    }

    /**
     * Delete a task by ID.
     */
    public function destroy($id): JsonResponse
    {
        TaskRequest::validateTaskId($id);

        $task = Tasks::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found.',
            ], 404);
        }

        $task->delete();

        return response()->json(null, 204);
    }
}