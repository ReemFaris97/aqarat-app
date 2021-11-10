<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\ChatResource;
use App\Http\Resources\InboxResource;
use App\Http\Resources\MessagesResource;
use App\Models\Chat;
use App\Models\Order;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::whereHas('model')->whereHas('users', function ($q) {
            $q->where('user_id', auth()->id());
        })->latest('updated_at')->paginate(10);
        return \responder::success(new BaseCollection($chats, InboxResource::class));
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'receiver_id' => 'exists:users,id|required_without:chat_id|not_in:' . auth()->id(),
            'chat_id' => 'required_without:receiver_id|exists:chats,id',
            'message' => 'required|string',
//            'model_type' => 'required|in:Order,Advertisement',
            'model_id' => 'required_without:chat_id|string'
        ]);

        if ($request->has('receiver_id')) {
            $chat = Chat::whereHas('users', function ($q) use ($request) {
                $q->where('user_id', $request['receiver_id']);
            })->whereHas('users', function ($q) use ($request) {
                $q->where('user_id', auth()->id());
            })->firstOrCreate(['model_type' =>Order::class, 'model_id' => $request['model_id']]);
            if ($chat->wasRecentlyCreated) {
                $chat->users()->createMany([
                    ['user_id' => $request['receiver_id']]
                    , ['user_id' => auth()->id()]
                ]);
            }
        } else {
            $chat = Chat::find($request['chat_id']);
        }

        $inputs['user_id'] = auth()->id();

        $message = $chat->messages()->create($inputs);

        return \responder::success(new MessagesResource($message));
    }

    public function show(Chat $chat)
    {
        return \responder::success(new ChatResource($chat));
    }

    public function getMessagesByModel(Request $request)
    {
        $inputs = $request->validate([
            'model_id' => 'required|int',
//            'model_type' => 'required|in:Order,Advertisement'
        ]);
        $model = Order::findOrFail($request['model_id']);
        $chat = $model->chats()->whereHas('users', function ($q) {
            return $q->where('user_id', auth()->id());
        })->firstOrFail();

        return \responder::success(new ChatResource($chat));
    }
}
