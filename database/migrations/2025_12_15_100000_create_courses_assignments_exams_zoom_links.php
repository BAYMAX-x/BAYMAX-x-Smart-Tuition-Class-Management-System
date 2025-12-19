<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('assignments', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->string('resource_url')->nullable();
            $table->timestamps();
        });

        Schema::create('exams', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('exam_date')->nullable();
            $table->string('paper_url')->nullable();
            $table->timestamps();
        });

        Schema::create('zoom_links', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->string('meeting_url');
            $table->string('passcode')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zoom_links');
        Schema::dropIfExists('exams');
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('courses');
    }
};
