<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\StorePackRequest;
use App\Http\Requests\Api\V1\Admin\UpdatePackRequest;
use App\Http\Resources\V1\Admin\PackResource;
use App\Http\Resources\V1\Mobile\PackCollection;
use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function index(Request $request)
    {
        $packs = Pack::orderBy('id', 'desc')
            ->paginate($request->input('per_page', 10));

        return new PackCollection($packs);
    }

    public function store(StorePackRequest $request)
    {
        return new PackResource(Pack::create($request->validated()));
    }

    public function show(Pack $pack)
    {
        return new PackResource($pack);
    }

    public function update(UpdatePackRequest $request, Pack $pack)
    {
        return new PackResource(tap($pack)->update($request->validated()));
    }

    public function destroy(Pack $pack)
    {
        $pack->delete();

        return response()->json([
            "message" => "Success."
        ]);
    }
}
