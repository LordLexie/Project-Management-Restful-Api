<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\V1\StoreUserRequest;

class RolesController extends Controller
{
    //

    public function store(StoreUserRequest $request)
    {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    }
}
