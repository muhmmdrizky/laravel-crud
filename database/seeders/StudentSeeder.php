<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Schema::disableForeignKeyConstraints();
        Student::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => 'Muhammad Rizky',
                'student_id' => '101001',
                'class_id' => 1,
                'gender' => 'M',
            ],
            [
                'name' => 'Mohammad Ahsan',
                'student_id' => '101002',
                'class_id' => 2,
                'gender' => 'M',
            ],
            [
                'name' => 'Hendra Setiawan',
                'student_id' => '101003',
                'class_id' => 3,
                'gender' => 'M',
            ],
            [
                'name' => 'Fajar Alfian',
                'student_id' => '101004',
                'class_id' => 4,
                'gender' => 'M',
            ],
            [
                'name' => 'Nabila Taqiyyah',
                'student_id' => '101005',
                'class_id' => 2,
                'gender' => 'F',
            ],
            [
                'name' => 'Tiara Andini',
                'student_id' => '101006',
                'class_id' => 3,
                'gender' => 'F',
            ]
        ];
        $timestamp = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $timestamp;
            $record['updated_at'] = $timestamp;
        }
        Student::insert($data);
    */
        Student::factory()->count(24)->create();
    }
}
