@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-100 min-h-screen flex flex-col items-center">
        <h1 class="text-2xl font-semibold text-center mb-6">Add New Student</h1>
        
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" class="form-control mt-1 w-full border-gray-300 rounded-md shadow-sm" id="name" name="name" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="form-control mt-1 w-full border-gray-300 rounded-md shadow-sm" id="email" name="email" required>
                </div>

                <div>
                    <label for="course_ids" class="block text-sm font-medium text-gray-700">Select Courses</label>
                    <select multiple class="form-control mt-1 w-full border-gray-300 rounded-md shadow-sm" id="course_ids" name="course_ids[]">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-200">Add Student</button>
            </form>
        </div>
    </div>
@endsection
