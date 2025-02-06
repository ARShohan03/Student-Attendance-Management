@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $student->name }}</h1>
        <p>Email: {{ $student->email }}</p>

        @if($student->courses->isNotEmpty())
            <h3>Enrolled Courses:</h3>
            <ul>
                @foreach ($student->courses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        @else
            <p>This student is not enrolled in any courses.</p>
        @endif

        <a href="{{ route('students.index') }}" class="btn btn-secondary">Go Back to Students List</a>
    </div>
@endsection
