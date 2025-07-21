<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
    public function showSubjects($id)
    {
        $major = Major::with('subjects')->findOrFail($id);

        return view('majors.subjects', compact('major'));
    }
}
