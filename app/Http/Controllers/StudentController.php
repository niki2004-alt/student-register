<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('major')->get();
        $majors = Major::all(); 
        return view('students.index', compact('students', 'majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::all();
        $lastStudent = Student::orderBy('id', 'desc')->first();

        if (!$lastStudent) {
            $newNumber = 'STU001';
        } else {
            $lastNumber = (int) str_replace('STU', '', $lastStudent->number);
            $newNumber = 'STU' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        return view('students.create', compact('majors', 'newNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'regex:/^[a-zA-Z\s]+$/'],
            'year' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            
        ]);

        Student::create([
            'number' => $request->number,
            'name' => $request->name,
            'gender' => $request->gender,
            'year' => $request->year,
            'major_id' => $request->major, // You used major in form input
        ]);

        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $majors = Major::all();

        return view('students.edit', compact('student', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'regex:/^[a-zA-Z\s]+$/'],
            // 'major_id' => ['required', 'exists:majors,id'],
            'year' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
        ]);

        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name,
            'major_id' => $request->major,
            'year' => $request->year,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Show student + major + major subjects.
     */
    public function detail($id)
    {
        $student = Student::with(['major.subjects'])->findOrFail($id);

        return view('students.detail', compact('student'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
    public function show($id)
{
    $student = Student::with('major.subjects')->findOrFail($id);
    return view('students.detail', compact('student'));
}

}