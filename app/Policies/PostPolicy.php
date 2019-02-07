<?php

namespace App\Policies;

use App\User;
use App\Post;
use App\Type;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can create posts.
     * for user of type 2
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $post_permission=Type::where('permission', "post")->get()->toArray()[0]["id"];
        $user_permission=$user->type_id;
        return $post_permission=== $user_permission;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {

        $post_permission=Type::where('permission', "edit")->get()->toArray()[0]["id"];
        $user_permission=$user->type_id;
        return $post_permission=== $user_permission;
    }



}
