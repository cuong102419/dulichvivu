<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TourChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tour;

    public function __construct($tour)
    {
        $this->tour = $tour;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('tours'),
        ];
    }

    public function broadcastAs() {
        return 'TourChanged';
    }
}
