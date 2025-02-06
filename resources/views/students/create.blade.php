@extends('layouts.app')

@section('content')
    <div class="p-30 bg-gray-200">
        <h1 class="text-lg text-center">Add Student</h1>
        <form action="{{ route('students.store') }}" method="POST" class="m-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="course_ids" class="form-label">Courses</label>
                <select multiple class="form-control" id="course_ids" name="course_ids[]">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded-md">Submit</button>
        </form>
    </div>
@endsection