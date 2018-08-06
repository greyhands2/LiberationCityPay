<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Liberation City',
                'description' => ''
            ],
            [
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Liberation City Members',
                'description' => ''
            ]
        ];

        foreach ($roles as $serial => $role) {
            \App\Role::create($role);
        }
    }
}
