<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\ModuleCollection;
use App\Http\Resources\V1\Mobile\ModuleResource;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Request $request): ModuleCollection
    {
        $modules = Module::when($request->input('pack_id'), function ($query) use ($request) {
            $query->where('pack_id', $request->input('pack_id'));
        })->get();

        return new ModuleCollection($modules);
    }
}
