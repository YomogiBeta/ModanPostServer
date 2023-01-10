<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function postUpdate(User $user, Post $post)
    {
        return $user->id === $post->user_id ? Response::allow() : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function postDelete(User $user, Post $post)
    {
        return $user->id === $post->user_id ? Response::allow() : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function commentUpdate(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id ? Response::allow() : Response::deny('You do not own this comment.');
    }

        /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function commentDelete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id ? Response::allow() : Response::deny('You do not own this comment.');
    }
}
