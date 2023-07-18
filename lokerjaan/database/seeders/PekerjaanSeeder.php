<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id' => '1',
                'title' => 'Web Programmer',
            ],
            [
                'user_id' => '2',
                'title' => 'Android Developer',
            ],
            [
                'user_id' => '3',
                'title' => 'Game Developer',
            ]
        ];
        foreach ($datas as $value) {
            Pekerjaan::create($value);
        }
    }
}
