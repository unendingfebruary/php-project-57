<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
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
     */
    public function create(): View
    {
        return view('taskStatus.create');
    }

    /**
     * @param StoreTaskStatusRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTaskStatusRequest $request): RedirectResponse
    {
        $taskStatus = new TaskStatus();
        $taskStatus->name = $request->name;
        $taskStatus->save();

        flash('Статус успешно создан')->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * @param TaskStatus $taskStatus
     * @return View
     */
    public function edit(TaskStatus $taskStatus): View
    {
        return view('taskStatus.edit', [
            'taskStatus' => $taskStatus,
        ]);
    }

    /**
     * @param UpdateTaskStatusRequest $request
     * @param TaskStatus $taskStatus
     * @return RedirectResponse
     */
    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->name = $request->name;
        $taskStatus->save();

        flash('Статус успешно изменён')->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * @param TaskStatus $taskStatus
     * @return RedirectResponse
     */
    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->delete();

        flash('Статус успешно удалён')->success();

        return redirect()->route('task_statuses.index');
    }
}
