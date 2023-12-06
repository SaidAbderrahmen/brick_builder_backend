<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RecepieStoreRequest;
use App\Http\Requests\RecepieUpdateRequest;

class RecepieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Recepie::class);

        $search = $request->get('search', '');

        $recepies = Recepie::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.recepies.index', compact('recepies', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Recepie::class);

        return view('app.recepies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecepieStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Recepie::class);

        $validated = $request->validated();
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public');
        }

        $recepie = Recepie::create($validated);

        return redirect()
            ->route('recepies.edit', $recepie)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Recepie $recepie): View
    {
        $this->authorize('view', $recepie);

        return view('app.recepies.show', compact('recepie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Recepie $recepie): View
    {
        $this->authorize('update', $recepie);

        return view('app.recepies.edit', compact('recepie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        RecepieUpdateRequest $request,
        Recepie $recepie
    ): RedirectResponse {
        $this->authorize('update', $recepie);

        $validated = $request->validated();
        if ($request->hasFile('picture')) {
            if ($recepie->picture) {
                Storage::delete($recepie->picture);
            }

            $validated['picture'] = $request->file('picture')->store('public');
        }

        $recepie->update($validated);

        return redirect()
            ->route('recepies.edit', $recepie)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Recepie $recepie
    ): RedirectResponse {
        $this->authorize('delete', $recepie);

        if ($recepie->picture) {
            Storage::delete($recepie->picture);
        }

        $recepie->delete();

        return redirect()
            ->route('recepies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
