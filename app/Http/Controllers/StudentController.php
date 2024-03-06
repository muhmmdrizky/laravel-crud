<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Classroom;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    // Request $request -> buat nampung data apa aja yang diinput di form
    public function store(StudentCreateRequest $request)
    {
        $student = Student::create($request->all());
        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add data success.');
        }
        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = Classroom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        Student::findOrFail($id)->update($request->all());
        return redirect('/students');
    }

    public function destroy($id)
    {
        $deletedStudent = DB::table('students')->where('id', $id)->delete();

        if ($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Delete data success.');
        }

        return redirect('/students');
    }
}
