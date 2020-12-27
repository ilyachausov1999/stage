<?php


namespace App\Traits;


use App\Models\Users;
use Illuminate\Support\Facades\Auth;

trait RolesTrait

{
    /**
     * @return mixed
     */
    public function getRole()
    {
        $role = Users::query()->with('role')->find(Auth::user());

        foreach ($role as $userRole) {

//            if ($userRole->role['name'] == 'admin'){
//                return $role = 'admin';
//            }

            return $userRole->role['name'];
        }
    }
}
