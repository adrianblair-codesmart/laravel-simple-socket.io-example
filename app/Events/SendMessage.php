<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast {

    use Dispatchable,
        InteractsWithSockets,
        SerializesModels;

    public $data;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data) {
        //
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn() {
        //Return the public channel.
        return new Channel('channel-name');

        //A private channel requires a user to be authenticated and authorized.
        //You can return a private channel as follows:
        //return new PrivateChannel('channel-name');
    }
}
