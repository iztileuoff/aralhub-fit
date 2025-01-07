<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\PackCollection;
use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function index(Request $request): PackCollection
    {
        $packs = Pack::where('is_active', true)->get();

        return new PackCollection($packs);
    }
}
