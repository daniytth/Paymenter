<?php

namespace Paymenter\Extensions\Others\Logs\Policies;

use App\Models\User;
use Paymenter\Extensions\Others\Logs\Models\LogRule;

class LogRulePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('admin.logs_rules.view');
    }

    public function view(User $user, LogRule $rule): bool
    {
        return $user->hasPermission('admin.logs_rules.view');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('admin.logs_rules.create');
    }

    public function update(User $user, LogRule $rule): bool
    {
        return $user->hasPermission('admin.logs_rules.update');
    }

    public function delete(User $user, LogRule $rule): bool
    {
        return $user->hasPermission('admin.logs_rules.delete');
    }

    public function deleteAny(User $user): bool
    {
        return $user->hasPermission('admin.logs_rules.delete');
    }
}

