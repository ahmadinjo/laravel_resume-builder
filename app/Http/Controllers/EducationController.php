<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $education = $request->user()->education;

        return view('education.index', ['education' => $education]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request): RedirectResponse
    {
        $education = new Education($request->safe()->all());
        $request->user()->education()->save($education);
        return Redirect::route('education.index')->with('status', 'education-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Education $education): View|RedirectResponse
    {
        if ($request->user()->id !== $education->user_id) return Redirect::route('education.index');

        return view('education.show', ['education' => $education]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Education $education): View|RedirectResponse
    {
        if ($request->user()->id !== $education->user_id) return Redirect::route('education.index');

        return view('education.edit', ['education' => $education]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education): RedirectResponse
    {
        if ($request->user()->id !== $education->user_id) return Redirect::route('education.index');

        $education->update($request->safe()->all());

        return Redirect::route('education.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Education $education): RedirectResponse
    {
        if ($request->user()->id !== $education->user_id) return Redirect::route('education.index');
        $education->delete();
        return Redirect::route('education.index');
    }
}
