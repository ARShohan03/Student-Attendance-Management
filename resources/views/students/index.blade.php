@extends('layouts.app') <!-- Extend the app.blade.php layout -->

@section('content') <!-- Define the content for the 'content' section -->
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1 class="h3 mb-0">Students</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('students.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Student
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Courses</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        @foreach ($student->courses as $course)
                                            <span class="badge bg-primary me-1">{{ $course->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection