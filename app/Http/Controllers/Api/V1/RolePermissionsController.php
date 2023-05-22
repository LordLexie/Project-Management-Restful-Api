<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RolePermissions;

use App\Http\Resources\RolePermissionsResource;
use App\Http\Requests\V1\StoreRolePermissionsRequest;

class RolePermissionsController extends Controller
{
    public function store(StoreRolePermissionsRequest $request)
    {
        $permission = new RolePermissions();
        $permission->fill($request->validated())->save();

        return new RolePermissionsResource($permission);
    }
}
