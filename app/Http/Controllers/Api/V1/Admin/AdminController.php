<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\StoreAdminRequest;
use App\Http\Requests\Api\V1\Admin\UpdateAdminRequest;
use App\Http\Resources\V1\Admin\AdminCollection;
use App\Http\Resources\V1\Admin\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::where('is_super_admin', false)
            ->where('id', '!=', auth()->id())
            ->when($request->input('search'), function ($query) use ($request) {
                $query->search($request->input('search'));
            })
            ->paginate($request->input('per_page', 10));

        return new AdminCollection($admins);
    }

    public function store(StoreAdminRequest $request)
    {
        return new AdminResource(Admin::create($request->validated()));
    }

    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->validated());

        return new AdminResource($admin);
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return response()->json([
            'message' => 'Success.',
        ]);
    }
}
