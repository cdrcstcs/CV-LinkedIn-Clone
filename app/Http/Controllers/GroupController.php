<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\GroupRequest;
use App\Http\Resources\GroupResource;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with(['admin', 'members'])->get();
        return GroupResource::collection($groups);
    }

    public function store(GroupRequest $request)
    {
        $group = Group::create($request->validated());
        return new GroupResource($group);
    }

    public function show(Group $group)
    {
        return new GroupResource($group->load(['admin', 'members']));
    }

    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        return new GroupResource($group);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->noContent();
    }
}
