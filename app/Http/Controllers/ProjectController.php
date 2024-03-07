<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $projects = $request->user()->projects;

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $project = new Project($request->safe()->all());
        $request->user()->projects()->save($project);
        return Redirect::route('projects.index')->with('status', 'projects-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Project $project): View|RedirectResponse
    {
        if ($request->user()->id !== $project->user_id) return Redirect::route('projects.index');

        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Project $project): View|RedirectResponse
    {
        if ($request->user()->id !== $project->user_id) return Redirect::route('projects.index');

        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        if ($request->user()->id !== $project->user_id) return Redirect::route('projects.index');

        $project->update($request->safe()->all());

        return Redirect::route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Project $project): RedirectResponse
    {
        if ($request->user()->id !== $project->user_id) return Redirect::route('projects.index');
        $project->delete();
        return Redirect::route('projects.index');
    }
}
