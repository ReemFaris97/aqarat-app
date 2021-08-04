<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\ChatResource;
use App\Http\Resources\InboxResource;
use App\Http\Resources\MessagesResource;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::whereHas('users', function ($q) {
            $q->where('user_id', auth()->id());
        })->latest('updated_at')->paginate(10);
        return \responder::success(new BaseCollection($chats, InboxResource::class));
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'model_type' => 'required|in:Order,Advertisement',
            'model_id' => 'required|string']);

        $chat = Chat::whereHas('users', function ($q) use ($request) {
            $q->where('user_id', $request['receiver_id']);
        })->whereHas('users', function ($q) use ($request) {
            $q->where('user_id', auth()->id());
        })->firstOrCreate(['model_type' => 'App\\Models\\' . $request['model_type'], 'model_id' => $request['model_id']]);
        if ($chat->wasRecentlyCreated) {
            $chat->users()->createMany([['user_id' => $request['receiver_id'], ['user_id' => auth()->id()]]]);
        }

        $inputs['user_id'] = auth()->id();

        $message = $chat->messages()->create($inputs);

        return \responder::success(new MessagesResource($message));
    }

    public function show(Chat $chat)
    {
        return \responder::success(new ChatResource($chat));
    }
}
