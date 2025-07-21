<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function create()
    {
        $majors = Major::all();
        return view('students.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'major_id' => 'required|exists:majors,id',
            'name' => 'required|string',
            'major' => 'required|exists:majors,id',
            // other validation rules
        ]);

        Student::create([
            'name' => $validated['name'],
            'major_id' => $validated['major'],
            // other fields
        ]);

        return redirect()->route('students.index')->with('success', 'Student saved!');
    }
   

}
