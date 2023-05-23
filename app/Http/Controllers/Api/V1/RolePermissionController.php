<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RolePermission;
use App\Http\Resources\RolePermissionResource;
use App\Http\Resources\RolePermissionCollection;
use App\Http\Requests\v1\RolePermissionRequest;

class RolePermissionController extends Controller
{
    public function index()
    {
         return new RolePermissionCollection(RolePermission::all());    
    }

    public function show(RolePermission $rolePermission)
    {    
        return RolePermissionResource::make($rolePermission);    
    }

    public function store(RolePermissionRequest $request)
    {
        $data = $request->validated();
        $rolePermission = new RolePermission();
        $rolePermission->fill($data)->save();

        return response()->json([
            'data' => new RolePermissionResource($rolePermission),
            'message' => 'RolePermission created successfully!',            
        ]);                                                             
    }

    public function destroy(RolePermission $rolePermission)
    {
        $rolePermission->delete();
        return response()->noContent();
    }
}
