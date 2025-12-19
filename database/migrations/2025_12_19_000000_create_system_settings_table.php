<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('system_settings', function (Blueprint $table): void {
            $table->id();
            $table->string('school_name')->nullable();
            $table->string('school_tagline')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('timezone')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('term_label')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('footer_note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
