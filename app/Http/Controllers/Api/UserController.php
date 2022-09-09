<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(UserRequest $request)
    {
        $User = User::create($request->validated());

        return new UserResource($User);
    }

    public function show(User $User)
    {
        return new UserResource($User);
    }

    public function update(UserRequest $request, User $User)
    {
        $User->update($request->validated());

        return new UserResource($User);
    }

    public function destroy(User $User)
    {
        $User->delete();

        return response()->noContent();
    }
}
