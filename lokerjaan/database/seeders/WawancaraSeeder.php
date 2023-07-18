<?php

namespace Database\Seeders;

use App\Models\Wawancara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WawancaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id' => '1',
                'tanggal_mulai' => date('Y-m-d'),
            ],
            [
                'user_id' => '2',
                'tanggal_mulai' => date('Y-m-d'),
            ],
            [
                'user_id' => '3',
                'tanggal_mulai' => date('Y-m-d'),
            ]
        ];
        foreach ($datas as $value) {
            Wawancara::create($value);
        }
    }
}
