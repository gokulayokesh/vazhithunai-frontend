<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public $user;

    /**
     * Create a new event instance.
     */
    public function __construct($message, $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * The channel the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        // Private channel for a specific chat
        return [
            new PrivateChannel('chat.'.$this->message->chat_id),
        ];
    }

    /**
     * Optional: customize event name
     */
    public function broadcastAs(): string
    {
        return 'message.sent';
    }
}
