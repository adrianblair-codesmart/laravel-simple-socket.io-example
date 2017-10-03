<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use Illuminate\Http\Request;

class MessageController extends Controller {

    public function SendMessage(Request $request) {
        
        //broadcast(new MessageSent($user, $chatroom, $message))->toOthers();
        event(new SendMessage($request->input('data')));

        return [
            'status' => 'Message Sent!'
        ];
    }

}
