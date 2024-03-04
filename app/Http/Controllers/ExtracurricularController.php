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
}
