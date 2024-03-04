<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        // $class = Classroom::all();
        $class = Classroom::all();
        return view('classroom', ['classList' => $class]);
    }
}
