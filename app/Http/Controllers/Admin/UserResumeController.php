<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;

use function Spatie\LaravelPdf\Support\pdf;

class UserResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $user->load('resumes');

        return view('admin.resumes.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Resume $resume)
    {
        $resume = $user->resumes($resume)->first();
        if(!$resume) return redirect()->route('users.resumes.index', ['user' => $user]);

        $experience_ids = explode(',', $resume->work_experiences);
        $education_ids = explode(',', $resume->education);
        $project_ids = explode(',', $resume->projects);
        $reference_ids = explode(',', $resume->references);

        $experiences = $user->experiences($experience_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $education = $user->education($education_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $projects = $user->projects($project_ids)->orderBy('end_date', 'desc')->get();
        $references = $user->references($reference_ids)->get();

        return view('admin.resumes.show', ['resume' => $resume, 'experiences' => $experiences, 'education' => $education, 'projects' => $projects, 'references' => $references]);
    }

    /**
     * Display the specified resource.
     */
    public function downloadResume(User $user, Resume $resume)//: PdfBuilder|RedirectResponse
    {
        $resume = $user->resumes($resume)->first();
        if(!$resume) return redirect()->route('users.resumes.index', ['user' => $user]);

        $experience_ids = explode(',', $resume->work_experiences);
        $education_ids = explode(',', $resume->education);
        $project_ids = explode(',', $resume->projects);
        $reference_ids = explode(',', $resume->references);

        $experiences = $user->experiences($experience_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $education = $user->education($education_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $projects = $user->projects($project_ids)->orderBy('end_date', 'desc')->get();
        $references = $user->references($reference_ids)->get();

        return pdf()->view('admin.resumes.show', ['resume' => $resume, 'experiences' => $experiences, 'education' => $education, 'projects' => $projects, 'references' => $references])->name($resume->slug.'pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
