<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

use App\Http\Requests\v1\StoreUserRequest;
use App\Http\Requests\v1\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
       return new UserCollection(User::all());    
    }

    public function show(User $user)
    {    
        return UserResource::make($user);    
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }

    public function store(StoreUserRequest $request)
    {
       $data = $request->validated();
       $data['password'] = Hash::make($data['password']);
       $user = new User();
       $user->fill($data)->save();

       return response()->json([
        'data' => new UserResource($user),
        'message' => 'User created successfully!',            
        ]);
    
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        return response()->json([
            'data' => new UserResource($user),
            'message' => 'Role updated successfully!',            
        ]); 

    }

}
