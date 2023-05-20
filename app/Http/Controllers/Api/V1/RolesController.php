<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

use App\Http\Requests\V1\StoreRoleRequest;
use App\Http\Requests\V1\UpdateRoleRequest;

use App\Http\Resources\RolesResource;
use App\Models\Roles;

class RolesController extends Controller
{

    public function index()
    {
        return RolesResource::collection(Roles::all());
    }

    public function show(Roles $role)
    {
        return RolesResource::make($role);
    }

    public function store(StoreRoleRequest $request)
    {
       $data = $request->validated();
       $data['code'] = mt_rand(1000, 9000);

        $role = new Roles(); 
        $role->fill($data)->save();

        return response()->json([
            'data' => new RolesResource($role),
            'message' => 'Role created successfully!',            
        ]); 
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Roles::find($id);
        
        if(is_null($role)){
            return response()->json(['message' => 'Role not found!'], 404);
        }else{
            $role->update($request->validated());
            return response()->json([
                'data' => new RolesResource($role),
                'message' => 'Role updated successfully!',            
            ]); 
        }   
        
    } 
    
    public function destroy(Roles $role)
    {
        $role->delete();
        return response()->noContent();
    }
}
