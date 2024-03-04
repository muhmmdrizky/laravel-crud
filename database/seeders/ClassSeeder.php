<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Classroom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'X IT 1'],
            ['name' => 'X IT 2'],
            ['name' => 'X IT 3'],
            ['name' => 'X IT 4']
        ];
        $timestamp = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $timestamp;
            $record['updated_at'] = $timestamp;
        }
        Classroom::insert($data);
    }
}
