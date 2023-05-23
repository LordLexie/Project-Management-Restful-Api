<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Permission;
use App\Http\Requests\v1\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\PermissionCollection;

class PermissionController extends Controller
{
    public function index()
    {
       return new PermissionCollection(Permission::all());    
    }

    public function show(Permission $permission)
    {    
        return PermissionResource::make($permission);    
    } 
    
    public function store(PermissionRequest $request)
    {
        $data = $request->validated();
        $permission = new Permission();
        $permission->fill($data)->save();

        return response()->json([
            'data' => new PermissionResource($permission),
            'message' => 'Permission created successfully!',            
        ]);
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        return response()->json([
            'data' => new PermissionResource($permission),
            'message' => 'Permission updated successfully!',            
        ]); 

    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->noContent();
    } 
}
