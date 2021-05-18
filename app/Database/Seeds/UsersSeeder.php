<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => 1,
            'email' => 'admin@myhospital.com',
            'username' => 'admin',
            'password_hash' => '$2y$10$.eQGB2gKbq9OUgOeYfwVI.sVOjdEwZtXz8gyQGB7Tnknobm1GBsL2',
            'reset_hash' => null,
            'reset_at' => null,
            'reset_expires' => null,
            'activate_hash' => null,
            'status' => null,
            'status_message' => null,
            'active' => 1,
            'force_pass_reset' => 0,
            'created_at' => '2021-05-18 01:30:55',
            'updated_at' => '2021-05-18 01:30:55',
            'deleted_at' => null
        ];

        $this->db->table('users')->insert($data);
    }
}
