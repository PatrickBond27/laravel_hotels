<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

// The role seeder seeds or in other words implements the attributes for the role that the user has.
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // The user with an admin role assigns with an administrator user.
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An Administrator user';
        $role_admin->save();

        // The user with a user role assigns with an ordinary user.
        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An Ordinary user';
        $role_user->save();
    }
}
