<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Http\Requests\StoreResumeRequest;
use App\Http\Requests\UpdateResumeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\LaravelPdf\PdfBuilder;

use function Spatie\LaravelPdf\Support\pdf;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $resumes = $request->user()->resumes;

        return view('resumes.index', ['resumes' => $resumes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $user = $request->user();

        return view('resumes.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResumeRequest $request): RedirectResponse
    {
        try {
            $photo = $request->file('photo')?->storePublicly('resume-pictures');
            $resume = new Resume($request->safe()->all());
            $resume->work_experiences = '';
            $resume->file = '';
            $resume->photo = $photo;
            $request->user()->resumes()->save($resume);
            // $experiences = $request->user()->experiences;
            return Redirect::route('resumes.addExperiences', ['resume' => $resume])->with('status', 'resumes-created');
        } catch (\Throwable $th) {
            //throw $th;

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Resume $resume): View|RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');

        $user = $request->user();

        $experience_ids = explode(',', $resume->work_experiences);
        $education_ids = explode(',', $resume->education);
        $project_ids = explode(',', $resume->projects);
        $reference_ids = explode(',', $resume->references);

        $experiences = $user->experiences($experience_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $education = $user->education($education_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $projects = $user->projects($project_ids)->orderBy('end_date', 'desc')->get();
        $references = $user->references($reference_ids)->get();

        return view('resumes.show', ['resume' => $resume, 'experiences' => $experiences, 'education' => $education, 'projects' => $projects, 'references' => $references]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Resume $resume): View|RedirectResponse
    {
        $user = $request->user()->with(['experiences', 'education', 'projects', 'references', 'resumes']);
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');

        return view('resumes.edit', ['resume' => $resume, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResumeRequest $request, Resume $resume): RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');

        $resume->update($request->safe()->all());

        return Redirect::route('resumes.addExperiences', ['resume' => $resume])->with('status', 'resumes-created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Resume $resume): RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $resume->delete();
        return Redirect::route('resumes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addExperiences(Request $request, Resume $resume): View|RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $user = $request->user()->load(['experiences']);

        return view('resumes.add-experiences', ['user' => $user, 'resume' => $resume]);
    }
    public function updateExperiences(Request $request, Resume $resume): RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $request->validate([
            'experiences' => ['required', 'array']
        ]);

        $experiences = implode(',', $request->experiences);
        $resume->work_experiences = $experiences;
        $resume->save();

        return Redirect::route('resumes.addEducation', ['resume' => $resume])->with('status', 'experiences-added');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addEducation(Request $request, Resume $resume): View|RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $user = $request->user()->load(['education']);

        return view('resumes.add-education', ['user' => $user, 'resume' => $resume]);
    }
    public function updateEducation(Request $request, Resume $resume): RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $request->validate([
            'education' => ['required', 'array']
        ]);

        $education = implode(',', $request->education);
        $resume->education = $education;
        $resume->save();

        return Redirect::route('resumes.addProjects', ['resume' => $resume])->with('status', 'education-added');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addProjects(Request $request, Resume $resume): View|RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $user = $request->user()->load(['projects']);

        return view('resumes.add-projects', ['user' => $user, 'resume' => $resume]);
    }
    public function updateProjects(Request $request, Resume $resume): RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $request->validate([
            'projects' => ['required', 'array']
        ]);

        $projects = implode(',', $request->projects);
        $resume->projects = $projects;
        $resume->save();

        return Redirect::route('resumes.addReferences', ['resume' => $resume])->with('status', 'projects-added');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addReferences(Request $request, Resume $resume): View|RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $user = $request->user()->load(['references']);

        return view('resumes.add-references', ['user' => $user, 'resume' => $resume]);
    }
    public function updateReferences(Request $request, Resume $resume): RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');
        $request->validate([
            'references' => ['required', 'array']
        ]);

        $references = implode(',', $request->references);
        $resume->references = $references;
        $resume->save();

        return Redirect::route('resumes.show', ['resume' => $resume])->with('status', 'references-added');
    }

    /**
     * Display the specified resource.
     */
    public function downloadResume(Request $request, Resume $resume) //: PdfBuilder|RedirectResponse
    {
        if ($request->user()->id !== $resume->user_id) return Redirect::route('resumes.index');

        $user = $request->user();

        $experience_ids = explode(',', $resume->work_experiences);
        $education_ids = explode(',', $resume->education);
        $project_ids = explode(',', $resume->projects);
        $reference_ids = explode(',', $resume->references);

        $experiences = $user->experiences($experience_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $education = $user->education($education_ids)->orderBy('current', 'desc')->orderBy('end_date', 'desc')->get();
        $projects = $user->projects($project_ids)->orderBy('end_date', 'desc')->get();
        $references = $user->references($reference_ids)->get();

        return pdf()->view('resumes.show', ['resume' => $resume, 'experiences' => $experiences, 'education' => $education, 'projects' => $projects, 'references' => $references])->name($resume->slug . 'pdf');
    }
}
