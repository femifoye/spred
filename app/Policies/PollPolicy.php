<?php

namespace App\Policies;

use App\User;
use App\Admin\Poll;
use Illuminate\Auth\Access\HandlesAuthorization;

class PollPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any polls.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        return $user->is_admin;
    }

    /**
     * Determine whether the user can view the poll.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Poll  $poll
     * @return mixed
     */
    public function view(User $user, Poll $poll)
    {
        //
        return $user->is_admin;
    }

    /**
     * Determine whether the user can create polls.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the poll.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Poll  $poll
     * @return mixed
     */
    public function update(User $user, Poll $poll)
    {
        //
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the poll.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Poll  $poll
     * @return mixed
     */
    public function delete(User $user, Poll $poll)
    {
        //
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the poll.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Poll  $poll
     * @return mixed
     */
    public function restore(User $user, Poll $poll)
    {
        //
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the poll.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Poll  $poll
     * @return mixed
     */
    public function forceDelete(User $user, Poll $poll)
    {
        //
        return $user->is_admin;
    }
}
