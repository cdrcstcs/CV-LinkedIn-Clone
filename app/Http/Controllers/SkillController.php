<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::with('users')->get();
        return SkillResource::collection($skills);
    }

    public function store(SkillRequest $request)
    {
        $skill = Skill::create($request->validated());
        return new SkillResource($skill);
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill->load('users'));
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return new SkillResource($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->noContent();
    }
}
