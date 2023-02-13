<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 15; $i++) {
            $data = [
                'sekolah_id' => mt_rand(1, 10),
                'image' => $faker->userName,
                'created_at'    => Time::createFromTimestamp($faker->unixTime),
                'updated_at'    => Time::now(),
            ];
            // Using Query Builder
            $this->db->table('galeri')->insert($data);
        }
    }
}
