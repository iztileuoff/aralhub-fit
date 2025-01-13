<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\IndexModuleRequest;
use App\Http\Requests\Api\V1\Admin\StoreModuleRequest;
use App\Http\Requests\Api\V1\Admin\UpdateModuleRequest;
use App\Http\Resources\V1\Admin\ModuleCollection;
use App\Http\Resources\V1\Admin\ModuleResource;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(IndexModuleRequest $request)
    {
        $modules = Module::orderBy('id', 'asc')
            ->when($request->input('pack_id'), function ($query) use ($request) {
                $query->where('pack_id', $request->input('pack_id'));
            })
            ->paginate($request->input('per_page', 10));

        return new ModuleCollection($modules);
    }

    public function store(StoreModuleRequest $request)
    {
        return new ModuleResource(Module::create($request->validated()));
    }

    public function show(Module $module)
    {
        return new ModuleResource($module);
    }

    public function update(UpdateModuleRequest $request, Module $module)
    {
        return new ModuleResource(tap($module)->update($request->validated()));
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return response()->json([
            "message" => "Success."
        ]);
    }
}
