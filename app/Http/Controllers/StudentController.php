<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
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
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])
            ->findOrFail($id);
        return view('student-detail', ['studentDetail' => $student]);
    }

    public function create()
    {
        $class = Classroom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect('/students');
    }
}
