@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Course Details</h4>
                    </div>
                    <div class="card-body">
                        <h5>{{ $course->name }}</h5>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Back to Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection