<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Basketball'],
            ['name' => 'Badminton'],
            ['name' => 'Mini Football'],
            ['name' => 'Scout'],
            ['name' => 'Programming'],
            ['name' => 'Robotic'],
        ];
        $timestamp = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $timestamp;
            $record['updated_at'] = $timestamp;
        }
        Extracurricular::insert($data);
    }
}
