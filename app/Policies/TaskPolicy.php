<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TaskPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user = null): bool
    {
        return true;
    }

    public function view(User $user = null): bool
    {
        return true;
    }

    public function create(): bool
    {
        return Auth::check();
    }

    public function update(): bool
    {
        return Auth::check();
    }

    public function delete(User $user, Task $task): bool
    {
        return $task->creator->is($user);
    }

    public function restore(): bool
    {
        return false;
    }

    public function forceDelete(): bool
    {
        return false;
    }
}
