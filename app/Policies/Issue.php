<?php

namespace App\Policies;

use App\Models\Issue as IssueModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Issue
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, IssueModel $issue): bool
    {
        return $issue->reporter_id === $user->id;
    }
}
