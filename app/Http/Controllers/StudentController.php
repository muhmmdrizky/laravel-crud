<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('students', ['studentList' => $student]);
    }

    public function show($id)
    {
    }
}
