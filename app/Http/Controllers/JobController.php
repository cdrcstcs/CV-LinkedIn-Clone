<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\JobRequest;
use App\Http\Resources\JobResource;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['company', 'poster'])->get();
        return JobResource::collection($jobs);
    }

    public function store(JobRequest $request)
    {
        $job = Job::create($request->validated());
        return new JobResource($job);
    }

    public function show(Job $job)
    {
        return new JobResource($job->load(['company', 'poster']));
    }

    public function update(JobRequest $request, Job $job)
    {
        $job->update($request->validated());
        return new JobResource($job);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return response()->noContent();
    }
}
