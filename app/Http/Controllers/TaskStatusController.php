<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskStatusController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('taskStatus.index', [
            'taskStatuses' => TaskStatus::all(),
        ]);
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create', TaskStatus::class);

        return view('taskStatus.create');
    }

    /**
     * @param StoreTaskStatusRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreTaskStatusRequest $request): RedirectResponse
    {
        $this->authorize('create', TaskStatus::class);

        $taskStatus = new TaskStatus();
        $taskStatus->name = $request->name;
        $taskStatus->save();

        flash(__('flash.task-status.store'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * @param TaskStatus $taskStatus
     * @return View
     * @throws AuthorizationException
     */
    public function edit(TaskStatus $taskStatus): View
    {
        $this->authorize('update', TaskStatus::class);

        return view('taskStatus.edit', [
            'taskStatus' => $taskStatus,
        ]);
    }

    /**
     * @param UpdateTaskStatusRequest $request
     * @param TaskStatus $taskStatus
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $this->authorize('update', TaskStatus::class);

        $taskStatus->name = $request->name;
        $taskStatus->save();

        flash(__('flash.task-status.update'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * @param TaskStatus $taskStatus
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        $this->authorize('delete', TaskStatus::class);

        $taskStatus->delete();

        flash(__('flash.task-status.destroy'))->success();

        return redirect()->route('task_statuses.index');
    }
}
