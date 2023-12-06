<?php

namespace App\Http\Controllers\Api;

use App\Models\Recepie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecepieResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\RecepieCollection;
use App\Http\Requests\RecepieStoreRequest;
use App\Http\Requests\RecepieUpdateRequest;

class RecepieController extends Controller
{
    public function index(Request $request): RecepieCollection
    {
        $this->authorize('view-any', Recepie::class);

        $search = $request->get('search', '');

        $recepies = Recepie::search($search)
            ->latest()
            ->paginate();

        return new RecepieCollection($recepies);
    }

    public function store(RecepieStoreRequest $request): RecepieResource
    {
        $this->authorize('create', Recepie::class);

        $validated = $request->validated();
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public');
        }

        $recepie = Recepie::create($validated);

        return new RecepieResource($recepie);
    }

    public function show(Request $request, Recepie $recepie): RecepieResource
    {
        $this->authorize('view', $recepie);

        return new RecepieResource($recepie);
    }

    public function update(
        RecepieUpdateRequest $request,
        Recepie $recepie
    ): RecepieResource {
        $this->authorize('update', $recepie);

        $validated = $request->validated();

        if ($request->hasFile('picture')) {
            if ($recepie->picture) {
                Storage::delete($recepie->picture);
            }

            $validated['picture'] = $request->file('picture')->store('public');
        }

        $recepie->update($validated);

        return new RecepieResource($recepie);
    }

    public function destroy(Request $request, Recepie $recepie): Response
    {
        $this->authorize('delete', $recepie);

        if ($recepie->picture) {
            Storage::delete($recepie->picture);
        }

        $recepie->delete();

        return response()->noContent();
    }
}
