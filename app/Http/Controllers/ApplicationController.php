<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return ApplicationResource::collection($applications);
    }

    public function store(ApplicationRequest $request)
    {
        $application = Application::create($request->validated());
        return new ApplicationResource($application);
    }

    public function show(Application $application)
    {
        return new ApplicationResource($application);
    }

    public function update(ApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());
        return new ApplicationResource($application);
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return response()->noContent();
    }
}
