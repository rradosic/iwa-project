<?php
namespace IWA\Traits;

use IWA\Models\Role;

trait RoleTrait
{
    public function hasRole($role)
    {
        $role = Role::where('naziv', $role);
        $role = reset($role);

        if ($role) {
            if ($this->tip_id == $role->tip_id) {
                return true;
            }
        }
        
        return false;
    }
}
