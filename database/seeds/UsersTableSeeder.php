<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Liberation City',
            'email' => 'admin@liberationcity.org',
            'password' => bcrypt('admin')
        ];
        $newAdmin = \App\User::create($admin);
        $newAdmin->attachRole(1);

        $member = [
            'name' => 'Church Member',
            'email' => 'member@liberationcity.org',
            'password' => bcrypt('member')
        ];
        $newMember = \App\User::create($member);
        $newMember->attachRole(2);

    }
}
