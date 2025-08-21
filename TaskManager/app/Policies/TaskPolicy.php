<?php

namespace App\Policies;

use App\Models\TaskModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task.
     */
    public function view(User $user, TaskModel $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can update the task.
     */
    public function update(User $user, TaskModel $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can delete the task.
     */
    public function delete(User $user, TaskModel $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can toggle the task status.
     */
    public function toggle(User $user, TaskModel $task): bool
    {
        return $user->id === $task->user_id;
    }
}
