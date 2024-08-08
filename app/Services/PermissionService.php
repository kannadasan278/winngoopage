<?php

namespace App\Services;
use App\Models\Permission;

class PermissionService
{
    public function checkPermissionByGroup($groupName)
    {
        $permissions = Permission::where('group_name', $groupName)->get();
        return $permissions;
    }
}
