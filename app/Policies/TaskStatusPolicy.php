<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TaskStatusPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return Auth::check();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        return Auth::check();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return Auth::check();
    }
}
