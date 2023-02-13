<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $admin = [
            'username' => 'admin',
            'password' => password_hash('password', PASSWORD_BCRYPT),
            'role' => 'admin',
            'created_at'    => Time::createFromTimestamp($faker->unixTime()),
            'updated_at'    => Time::now(),
        ];
        // Using Query Builder
        $this->db->table('user')->insert($admin);

        for ($i = 0; $i < 98; $i++) {
            $data = [
                'username' => $faker->userName,
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role' => 'sekolah',
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now(),
            ];
            // Using Query Builder
            $this->db->table('user')->insert($data);
        }
    }
}
