<?php

use App\Models\User;
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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('resume_name');
            $table->string('slug');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone_no');
            $table->string('address');
            $table->string('photo')->nullable();
            $table->text('summary')->nullable();
            $table->text('skills');
            $table->string('work_experiences')->nullable();
            $table->string('projects')->nullable();
            $table->string('education')->nullable();
            $table->string('references')->nullable();
            $table->text('file')->nullable();
            $table->unique(['slug', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
