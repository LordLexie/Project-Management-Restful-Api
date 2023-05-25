<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProjectRequest;

use App\Models\Project;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return response()->json(ProjectCollection::make(Project::all()), 200);
    }

    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $data = $request->validated();

        $project->title = $data['title'];
        $project->location = $data['location'];
        $project->customer_id = $data['customer_id'];
        $project->description = $request->has('description') ? $request['description'] : null;
        $project->folder_id = Str::uuid();
        $project->status = 'active';
        $project->save();

        return response()->json(ProjectResource::make($project), 201);
    }

    public function show(Project $project)
    {
        return response()->json(ProjectResource::make($project), 200);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->title = $data['title'];
        $project->location = $data['location'];
        $project->customer_id = $data['customer_id'];
        $project->description = $request->has('description') ? $request['description'] : null;
        $project->save();

        return response()->json(ProjectResource::make($project), 200);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(null, 204);
    }
}
