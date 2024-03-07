<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use App\Http\Requests\StoreReferenceRequest;
use App\Http\Requests\UpdateReferenceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $references = $request->user()->references;

        return view('references.index', ['references' => $references]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('references.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReferenceRequest $request): RedirectResponse
    {
        $reference = new Reference($request->safe()->all());
        $request->user()->references()->save($reference);
        return Redirect::route('references.index')->with('status', 'references-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Reference $reference): View|RedirectResponse
    {
        if ($request->user()->id !== $reference->user_id) return Redirect::route('references.index');

        return view('references.show', ['reference' => $reference]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Reference $reference): View|RedirectResponse
    {
        if ($request->user()->id !== $reference->user_id) return Redirect::route('references.index');

        return view('references.edit', ['reference' => $reference]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReferenceRequest $request, Reference $reference): RedirectResponse
    {
        if ($request->user()->id !== $reference->user_id) return Redirect::route('references.index');

        $reference->update($request->safe()->all());

        return Redirect::route('references.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Reference $reference): RedirectResponse
    {
        if ($request->user()->id !== $reference->user_id) return Redirect::route('references.index');
        $reference->delete();
        return Redirect::route('references.index');
    }
}
