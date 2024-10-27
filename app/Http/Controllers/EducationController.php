<?php
namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::where('user_id', auth()->id())->get();
        return EducationResource::collection($educations);
    }

    public function store(EducationRequest $request)
    {
        $education = Education::create($request->validated());
        return new EducationResource($education);
    }

    public function show(Education $education)
    {
        return new EducationResource($education);
    }

    public function update(EducationRequest $request, Education $education)
    {
        $education->update($request->validated());
        return new EducationResource($education);
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return response()->noContent();
    }
}
