<?php

namespace App\Policies;

use App\User;
use App\Forum;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any forums.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function view(User $user, Forum $forum)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create forums.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function update(User $user, Forum $forum)
    {
        //
        return $user->id == $forum->creator_id;
    }

    /**
     * Determine whether the user can delete the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function delete(User $user, Forum $forum)
    {
        //
        return $user->id == $forum->creator_id;
    }

    /**
     * Determine whether the user can restore the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function restore(User $user, Forum $forum)
    {
        //
        return $user->id == $forum->creator_id;
    }

    /**
     * Determine whether the user can permanently delete the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function forceDelete(User $user, Forum $forum)
    {
        //
        return $user->id == $forum->creator_id;
    }
}
