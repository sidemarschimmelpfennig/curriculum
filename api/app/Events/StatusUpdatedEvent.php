<?php

namespace App\Events;

use App\Models\CandidatesVagas;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;


class StatusUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $candidate;
    public $status;

    public function __construct(CandidatesVagas $candidate, string $status)
    {
        $this->candidate = $candidate;
        $this->status = $status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
