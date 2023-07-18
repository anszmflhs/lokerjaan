<?php

namespace Database\Seeders;

use App\Models\Pelamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Anas Muflih',
                'alamat' => 'Jawa Tengah',
                'ttl' => 'Indonesia, 17 April 2006',
                'pekerjaan_id' => '1',
                'pass_foto' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'cv' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'user_id' => '1',
            ],
            [
                'name' => 'Anas Muf',
                'alamat' => 'Jawa Tengah',
                'ttl' => 'Indonesia, 17 April 2006',
                'pekerjaan_id' => '2',
                'pass_foto' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'cv' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'user_id' => '2',
            ],
            [
                'name' => 'Nash Muf',
                'alamat' => 'Jawa Tengah',
                'ttl' => 'Indonesia, 17 April 2006',
                'pekerjaan_id' => '3',
                'pass_foto' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'cv' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'user_id' => '3',
            ]
        ];
        foreach ($datas as $value) {
            Pelamar::create($value);
        }
    }
}
