<?php

namespace App\Http\Controllers;

use App\Models\Student; // Import the Student model
use App\Models\Course; // Import the Course model
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all students from the database
        $students = Student::all();

        // Pass the students to the view
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all courses to display in the form
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course_ids' => 'nullable|array', // Array of course IDs
            'course_ids.*' => 'exists:courses,id', // Ensure each course ID exists
        ]);

        // Create the student
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Attach the selected courses to the student
        if ($request->has('course_ids')) {
            $student->courses()->attach($request->course_ids);
        }

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Load the student's courses
        $student->load('courses');

        // Pass the student to the view
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Fetch all courses to display in the form
        $courses = Course::all();

        // Pass the student and courses to the view
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'course_ids' => 'nullable|array', // Array of course IDs
            'course_ids.*' => 'exists:courses,id', // Ensure each course ID exists
        ]);

        // Find the student by ID
        $student = Student::findOrFail($id);

        // Update the student
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Sync the selected courses for the student
        if ($request->has('course_ids')) {
            $student->courses()->sync($request->course_ids);
        } else {
            $student->courses()->detach(); // Remove all courses if none are selected
        }

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Detach all courses before deleting the student
        $student->courses()->detach();

        // Delete the student
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}