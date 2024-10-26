<?php

namespace App\Http\Controllers;

use App\Models\Endorsement;
use App\Http\Requests\EndorsementRequest;
use App\Http\Resources\EndorsementResource;

class EndorsementController extends Controller
{
    public function index()
    {
        $endorsements = Endorsement::with(['user', 'skill', 'endorser'])->get();
        return EndorsementResource::collection($endorsements);
    }

    public function store(EndorsementRequest $request)
    {
        $endorsement = Endorsement::create($request->validated());
        return new EndorsementResource($endorsement);
    }

    public function show(Endorsement $endorsement)
    {
        return new EndorsementResource($endorsement->load(['user', 'skill', 'endorser']));
    }

    public function update(EndorsementRequest $request, Endorsement $endorsement)
    {
        $endorsement->update($request->validated());
        return new EndorsementResource($endorsement);
    }

    public function destroy(Endorsement $endorsement)
    {
        $endorsement->delete();
        return response()->noContent();
    }
}
