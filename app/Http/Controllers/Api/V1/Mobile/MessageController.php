<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Mobile\StoreMessageRequest;
use App\Http\Resources\V1\Mobile\MessageCollection;
use App\Http\Resources\V1\Mobile\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::orderBy('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->cursorPaginate($request->input('per_page', 15));

        return new MessageCollection($messages);
    }

    public function store(StoreMessageRequest $request)
    {
        return new MessageResource(Message::create($request->validated()));
    }
}
