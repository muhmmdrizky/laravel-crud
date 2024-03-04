<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Mohammad Ahsan'],
            ['name' => 'Hendra Setiawan'],
            ['name' => 'Ricky Soebagja'],
            ['name' => 'Eng Hian'],
            ['name' => 'Susi Susanti'],
            ['name' => 'Debby Susanto'],
            ['name' => 'Anisa Azizah'],
            ['name' => 'Nauval Putra'],
        ];
        $timestamp = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $timestamp;
            $record['updated_at'] = $timestamp;
        }
        Teacher::insert($data);
    }
}
