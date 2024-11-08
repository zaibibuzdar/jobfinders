<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::first();

        // Admin
        $admin = new Admin;
        $admin->name = 'Admin';
        $admin->email = 'admin@mail.com';
        $admin->image = 'backend/image/default.png';
        $admin->password = bcrypt('password');
        $admin->email_verified_at = Carbon::now();
        $admin->remember_token = Str::random(10);
        $admin->save();
        $admin->assignRole($role);

        $admin = new Admin;
        $admin->name = 'Zakir Soft';
        $admin->email = 'developer@mail.com';
        $admin->image = 'backend/image/default.png';
        $admin->password = bcrypt('password@12345');
        $admin->email_verified_at = Carbon::now();
        $admin->remember_token = Str::random(10);
        $admin->save();
        $admin->assignRole($role);

    }
}
