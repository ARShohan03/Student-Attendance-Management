<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Foreign key to courses table
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Foreign key to students table
            $table->primary(['course_id', 'student_id']); // Composite primary key
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_student'); // Drop the table if the migration is rolled back
    }
}