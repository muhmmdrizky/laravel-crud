<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurricular = Extracurricular::all();
        return view('extracurricular', ['extracurricularList' => $extracurricular]);
    }

    public function show($id)
    {
        $extracurricular = Extracurricular::with('students')
            ->findOrFail($id);
        return view('extracurricular-detail', ['extracurricularDetail' => $extracurricular]);
    }
}
