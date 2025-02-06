@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $student->name }}</h1>
        <p>Email: {{ $student->email }}</p>
        <h3>Courses:</h3>
        <ul>
            @foreach ($student->courses as $course)
                <li>{{ $course->name }}</li>
            @endforeach
        </ul>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection