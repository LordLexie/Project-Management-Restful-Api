<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\UsersResource;

use App\Http\Requests\v1\StoreUserRequest;
use App\Http\Requests\v1\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
       return UsersResource::collection(User::all());    
    }

    public function show(User $user)
    {    
        return UsersResource::make($user);    
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }

    public function store(StoreUserRequest $request)
    {
       $data = $request->validated();
       $user = new User();
       $user->fill($data)->save();

       return response()->json([
        'data' => new UsersResource($user),
        'message' => 'User created successfully!',            
        ]);
    
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return response()->json([
            'data' => new UsersResource($user),
            'message' => 'Role updated successfully!',            
        ]); 

    }

}
