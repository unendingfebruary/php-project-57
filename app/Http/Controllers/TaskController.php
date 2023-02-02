<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    public function index(): View
    {
        return view('task.index', [
            'tasks' => Task::all(),
        ]);
    }

    public function create(): View
    {
        return view('task.create', [
            'statuses' => TaskStatus::all()->sortBy('id')->pluck('name', 'id'),
            'executors' => User::all()->sortBy('id')->pluck('name', 'id'),
            'labels' => Label::all()->sortBy('id')->pluck('name', 'id'),
        ]);
    }

    public function store(TaskStoreRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Task $task */
        $task = $user->createdTasks()->save(
            new Task($request->validated())
        );

        $labelsIds = collect($request->input('labels'))->filter(fn($label) => $label !== null);
        $task->labels()->attach($labelsIds);

        flash(__('flash.task.store'))->success();

        return redirect()->route('tasks.index');
    }

    public function show(Task $task): View
    {
        return view('task.show', [
            'task' => $task,
        ]);
    }

    public function edit(Task $task): View
    {
        return view('task.edit', [
            'task' => $task,
            'statuses' => TaskStatus::all()->sortBy('id')->pluck('name', 'id'),
            'executors' => User::all()->sortBy('id')->pluck('name', 'id'),
            'labels' => Label::all()->sortBy('id')->pluck('name', 'id'),
        ]);
    }

    public function update(TaskUpdateRequest $request, Task $task): RedirectResponse
    {
        $task->fill($request->validated());
        $task->save();

        $labelsIds = collect($request->input('labels'))->filter(fn($label) => $label !== null);
        $task->labels()->sync($labelsIds);

        flash(__('flash.task.update'))->success();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->labels()->detach();
        $task->delete();

        flash(__('flash.task.destroy'))->success();

        return redirect()->route('tasks.index');
    }
}
