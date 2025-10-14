<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CancelBooking extends Command
{
    protected $signature = 'bookings:cancel-booking';
    protected $description = 'Hủy booking quá hạn thanh toán tại văn phòng.';


    public function handle()
    {
        $bookings = Booking::where('payment_method', 'office')->where('status', 'pending')->where('created_at', '<', now()->subMinutes(2))->get();

        foreach($bookings as $booking) {
            $booking->status = 'canceled';
            $booking->save();

            $this->info("Booking #{$booking->code} đã hủy tự động.");
            Log::info("Đơn hàng #{$booking->code} đã hủy sau 2 ngày.");
        }

        return Command::SUCCESS;
    }
}
