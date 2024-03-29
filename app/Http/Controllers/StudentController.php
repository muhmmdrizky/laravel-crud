<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Classroom;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $student = Student::with('class')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('student_id', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(20);
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

        $newName = '';

        if ($request->file('photo')) {
            $random = rand(1, 100000);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . $random . '.' . $extension;
            $request->file('photo')->storeAs('img', $newName);
        }

        $request['image'] = $newName;
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
