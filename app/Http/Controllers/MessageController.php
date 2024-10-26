<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['sender', 'receiver'])->get();
        return MessageResource::collection($messages);
    }

    public function store(MessageRequest $request)
    {
        $message = Message::create($request->validated());
        return new MessageResource($message);
    }

    public function show(Message $message)
    {
        return new MessageResource($message->load(['sender', 'receiver']));
    }

    public function update(MessageRequest $request, Message $message)
    {
        $message->update($request->validated());
        return new MessageResource($message);
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return response()->noContent();
    }
}
