<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index()
    {
        // Fetch all courses from the database
        $courses = Course::all();

        // Pass the courses to the view
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created course in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:courses,name',
        ]);

        // Create the course
        Course::create([
            'name' => $request->name,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified course.
     */
    public function show(string $id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Pass the course to the view
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit(string $id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Pass the course to the view
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified course in the database.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:courses,name,' . $id,
        ]);

        // Find the course by ID
        $course = Course::findOrFail($id);

        // Update the course
        $course->update([
            'name' => $request->name,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified course from the database.
     */
    public function destroy(string $id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Delete the course
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}