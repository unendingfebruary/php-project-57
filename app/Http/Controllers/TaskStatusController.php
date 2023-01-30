<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusStoreRequest;
use App\Http\Requests\TaskStatusUpdateRequest;
use App\Models\TaskStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class);
    }

    public function index(): View
    {
        return view('taskStatus.index', [
            'taskStatuses' => TaskStatus::all()->sortBy('id'),
        ]);
    }

    public function create(): View
    {
        return view('taskStatus.create');
    }

    public function store(TaskStatusStoreRequest $request): RedirectResponse
    {
        $taskStatus = new TaskStatus();
        $taskStatus->fill($request->validated());
        $taskStatus->save();

        flash(__('flash.task-status.store'))->success();

        return redirect()->route('task_statuses.index');
    }

    public function edit(TaskStatus $taskStatus): View
    {
        return view('taskStatus.edit', [
            'taskStatus' => $taskStatus,
        ]);
    }

    public function update(TaskStatusUpdateRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->fill($request->validated());
        $taskStatus->save();

        flash(__('flash.task-status.update'))->success();

        return redirect()->route('task_statuses.index');
    }

    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        if ($taskStatus->tasks()->exists()) {
            flash(__('flash.task-status.destroy_error'))->error();
        } else {
            $taskStatus->delete();
            flash(__('flash.task-status.destroy_success'))->success();
        }

        return redirect()->route('task_statuses.index');
    }
}
