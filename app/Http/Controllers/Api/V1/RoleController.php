<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleCollection;
use App\Http\Requests\v1\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
         return new RoleCollection(Role::all());    
    }

    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $role = new Role();
        $role->fill($data)->save();

        return response()->json([
            'data' => new RoleResource($role),
            'message' => 'Role created successfully!',            
        ]);                                                             
    }

    public function show(Role $role)
    {    
        return RoleResource::make($role);    
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return response()->json([
            'data' => new RoleResource($role),
            'message' => 'Role updated successfully!',            
        ]); 

    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->noContent();
    }
}
