<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Superuser;

class SuperuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('project.admin.roles') as $role) {
            Role::firstOrCreate([
                'guard_name' => 'admin',
                'name' => $role
            ]);
        };

        $admins = [
            [
                'role' => 'administrator',
                'name' => 'Admin',
                'email' => 'ryo.promocoes@gmail.com',
                'password' => 'secret1234',
            ],
            [
                'role' => 'moderator',
                'name' => 'Moderator',
                'email' => 'moderator@gmail.com',
                'password' => 'secret1234',
            ],
            [
                'role' => 'professor',
                'name' => 'Professor',
                'email' => 'prof.aqc@gmail.com',
                'password' => 'secret1234',
            ],
        ];

        foreach ($admins as $admin) {
            $exist = Superuser::where('email', $admin['email'])->first();
            if(empty($exist)){
                $super_admin = Superuser::firstOrCreate([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => bcrypt($admin['password']),
                ]);
                $super_admin->assignRole($admin['role']);
            }
        }
    }
}
