<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use App\Http\Requests\StoreWorkExperienceRequest;
use App\Http\Requests\UpdateWorkExperienceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $experiences = $request->user()->experiences;

        return view('experiences.index', ['experiences' => $experiences]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkExperienceRequest $request): RedirectResponse
    {
        $experience = new WorkExperience($request->safe()->all());
        $request->user()->experiences()->save($experience);
        return Redirect::route('experiences.index')->with('status', 'experiences-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, WorkExperience $experience): View|RedirectResponse
    {
        if ($request->user()->id !== $experience->user_id) return Redirect::route('experiences.index');

        return view('experiences.show', ['experience' => $experience]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, WorkExperience $experience): View|RedirectResponse
    {
        if ($request->user()->id !== $experience->user_id) return Redirect::route('experiences.index');

        return view('experiences.edit', ['experience' => $experience]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkExperienceRequest $request, WorkExperience $experience): RedirectResponse
    {
        if ($request->user()->id !== $experience->user_id) return Redirect::route('experiences.index');

        $experience->update($request->safe()->all());

        return Redirect::route('experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, WorkExperience $experience): RedirectResponse
    {
        if ($request->user()->id !== $experience->user_id) return Redirect::route('experiences.index');
        $experience->delete();
        return Redirect::route('experiences.index');
    }
}
