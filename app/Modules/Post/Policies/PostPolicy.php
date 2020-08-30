<?php

namespace App\Modules\Post\Policies;

use App\Modules\Post\Models\Post;
use App\Modules\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if ($user->can('create posts')) {
            return true;
        }
    }

    public function update(User $user, Post $post)
    {
        if ($user->can('edit own posts')){
            return $user->id === $post->user_id;
        }

        if ($user->can('edit all posts')) {
            return true;
        }
    }

    public function delete(User $user, Post $post)
    {
        if ($user->can('delete own posts')){
            return $user->id === $post->user_id;
        }

        if ($user->can('delete any post')) {
            return true;
        }
    }
}
