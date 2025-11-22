<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('full_name')->after('id');
            $table->string('phone', 20)->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->string('grade', 50)->nullable()->after('address');
            $table->string('school_name')->nullable()->after('grade');
            $table->string('guardian_name')->nullable()->after('school_name');
            $table->string('guardian_phone', 20)->nullable()->after('guardian_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'full_name',
                'phone',
                'address',
                'grade',
                'school_name',
                'guardian_name',
                'guardian_phone',
            ]);
        });
    }
};
