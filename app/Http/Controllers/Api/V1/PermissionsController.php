<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Permissions;
use App\Http\Requests\V1\StorePermissionRequest;
use App\Http\Requests\V1\UpdatePermissionRequest;
use App\Http\Resources\PermissionsResource;

class PermissionsController extends Controller
{
    public function index()
    {
        return PermissionsResource::collection(Permissions::All());
    }

    public function store(StorePermissionRequest $request)
    {
        $data = $request->validated();
        $permission = new Permissions();
        $permission->fill($data)->save();

        return PermissionsResource::make($permission);
    }

    public function show(Permissions $permission)
    {
        return PermissionsResource::make($permission);
    }

    public function update(UpdatePermissionRequest $request, Permissions $permission)
    {
        $permission->update($request->validated());

        return response()->json([
            'data'=>new PermissionsResource($permission),
            'message'=>'Permission update successfully!'
        ]);
    }

    public function destroy(Permissions $permission)
    {
        $permission->delete();

        return response()->json([
            'message'=>'Permission deleted'
        ]);
    }

}
