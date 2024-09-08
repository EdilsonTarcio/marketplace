<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->username = 'admin';
        $admin->role = 'admin';
        $admin->email = 'adminemail@example.com';
        $admin->password = bcrypt('admin_talice');
        $admin->save();

        $seller = new User();
        $seller->name = 'Seller';
        $seller->username = 'seller';
        $seller->role = 'seller';
        $seller->email = 'selleremail@example.com';
        $seller->password = bcrypt('seller_talice');
        $seller->save();

        $user = new User();
        $user->name = 'User';
        $user->username = 'user';
        $user->role = 'user';
        $user->email = 'useremail@example.com';
        $user->password = bcrypt('user_talice');
        $user->save();
    }
}
