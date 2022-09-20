<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());
        $model_permissions = $request->input('model_permission', []);
        for ($model_permission = 0; $model_permission < count($model_permissions); $model_permission++) {
            if ($model_permissions[$model_permission] != '') {
                $role->meanings()->create($model_permissions[$model_permission]);
            }
        }

        return new RoleResource($role);
    }

    public function show(Role $Role)
    {
        return new RoleResource($Role);
    }

    public function update(RoleRequest $request, Role $Role)
    {
        $Role->update($request->validated());

        return new RoleResource($Role);
    }

    public function destroy(Role $Role)
    {
        $Role->delete();

        return response()->noContent();
    }
}
