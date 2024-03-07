<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\UserResumeController as AdminUserResumeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\WorkExperienceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('experiences', WorkExperienceController::class);
    Route::resource('education', EducationController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('references', ReferenceController::class);

    Route::get('resumes/{resume}/add/experiences', [ResumeController::class, 'addExperiences'])->name('resumes.addExperiences');
    Route::patch('resumes/{resume}/add/experiences', [ResumeController::class, 'updateExperiences'])->name('resumes.updateExperiences');
    Route::get('resumes/{resume}/add/education', [ResumeController::class, 'addEducation'])->name('resumes.addEducation');
    Route::patch('resumes/{resume}/add/education', [ResumeController::class, 'updateEducation'])->name('resumes.updateEducation');
    Route::get('resumes/{resume}/add/projects', [ResumeController::class, 'addProjects'])->name('resumes.addProjects');
    Route::patch('resumes/{resume}/add/projects', [ResumeController::class, 'updateProjects'])->name('resumes.updateProjects');
    Route::get('resumes/{resume}/add/references', [ResumeController::class, 'addReferences'])->name('resumes.addReferences');
    Route::patch('resumes/{resume}/add/references', [ResumeController::class, 'updateReferences'])->name('resumes.updateReferences');
    Route::get('resumes/{resume}/download', [ResumeController::class, 'downloadResume'])->name('resumes.downloadResume');
    Route::get('users/{user}/resumes/{resume}/download', [AdminUserResumeController::class, 'downloadResume'])->name('users.resumes.download')->middleware('admin');
    Route::resource('resumes', ResumeController::class);
    Route::resource('users', AdminUserController::class)->only(['index', 'show'])->middleware('admin');
    Route::resource('users.resumes', AdminUserResumeController::class)->only(['index', 'show'])->middleware('admin');
});
