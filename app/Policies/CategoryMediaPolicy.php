<?php

namespace App\Policies;

use App\Models\CategoryMedia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryMediaPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.media_category.index'));
    }


    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.media_category.create'));
    }

    public function edit(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.media_category.edit'));
    }


    public function destroy(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.media_category.destroy'));
    }
}
