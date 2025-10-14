<?php

namespace App\Console\Commands;

use App\Events\TourChanged;
use App\Models\Departure;
use Illuminate\Console\Command;

class DepartureUpdate extends Command
{
    protected $signature = 'departures:update';
    protected $description = 'Cập nhật trạng thái lịch trình';

    public function handle()
    {
        $departures = Departure::where('status', 'open')->where('end_date', '<=', now()->toDateString())->get();

        foreach ($departures as $departure) {
            if ($departure->booked > 0) {
                $departure->status = 'closed';
                $departure->save();
            }

            if ($departure->booked == 0) {
                $departure->status = 'cancelled';
                $departure->save();
            }
        }

        event(new TourChanged($departures));
    }
}
