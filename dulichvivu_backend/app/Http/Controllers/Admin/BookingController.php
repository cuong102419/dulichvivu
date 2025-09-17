<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Invoice;
use App\Models\Booking;
use App\Models\CustomerInformation;
use App\Models\Departure;
use App\Models\MomoTransaction;
use App\Models\PaypalTransaction;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest('id')->get();
        $status = [
            'pending' => ['value' => 'Chờ xác nhận', 'class' => 'secondary'],
            'confirmed' => ['value' => 'Đã xác nhận', 'class' => 'success'],
            'canceled' => ['value' => 'Đã hủy', 'class' => 'danger'],
        ];

        $paymentMethod = [
            'paypal' => [
                'url' => asset('administrator/images/paypal.png'),
                'name' => 'Paypal',
                'width' => '60'
            ],
            'momo' => [
                'url' => asset('administrator/images/momo.png'),
                'name' => 'Momo',
                'width' => '30'
            ],
            'office' => [
                'url' => asset('administrator/images/office.png'),
                'name' => 'Office',
                'width' => '30'
            ]
        ];

        $paymentStatus = [
            'unpaid' => ['value' => 'Chưa thanh toán', 'class' => 'secondary'],
            'paid' => ['value' => 'Đã thanh toán', 'class' => 'success'],
            'refunded' => ['value' => 'Đã hoàn tiền', 'class' => 'info']
        ];

        return view('booking.list', compact('bookings', 'status', 'paymentMethod', 'paymentStatus'));
    }

    public function detail($code)
    {
        $booking = Booking::where('code', $code)->firstOrFail();
        $status = [
            'pending' => ['value' => 'Chờ xác nhận', 'class' => 'secondary'],
            'confirmed' => ['value' => 'Đã xác nhận', 'class' => 'success'],
            'canceled' => ['value' => 'Đã hủy', 'class' => 'danger'],
        ];
        $transaction = null;

        if ($booking->payment_method == 'paypal') {
            $transaction = PaypalTransaction::where('order_code', $booking->code)->first();
        }

        if ($booking->payment_method == 'momo') {
            $transaction = MomoTransaction::where('order_code', $booking->code)->first();
        }

        $paymentMethod = [
            'paypal' => [
                'url' => asset('administrator/images/paypal.png'),
                'name' => 'Paypal',
                'width' => '100'
            ],
            'momo' => [
                'url' => asset('administrator/images/momo.png'),
                'name' => 'Momo',
                'width' => '50'
            ],
            'office' => [
                'url' => asset('administrator/images/office.png'),
                'name' => 'Office',
                'width' => '40'
            ]
        ];

        return view('booking.detail', compact('booking', 'status', 'transaction', 'paymentMethod'));
    }

    public function update(Request $request, Booking $booking)
    {
        $admin = Auth::guard('admin')->user();
        $customer = CustomerInformation::find($booking->customer_information_id);
        $totalPerson = $booking->number_adults + $booking->number_children;
        $departure = Departure::find($booking->departure_id);
        $tour = Tour::find($departure->tour_id);
        $transaction = null;

        if ($booking->payment_method == 'paypal') {
            $transaction = PaypalTransaction::where('order_code', $booking->code)->first();
        }

        if ($booking->payment_method == 'momo') {
            $transaction = MomoTransaction::where('order_code', $booking->code)->first();
        }

        if ($request->action == 'confirm') {
            $booking->update([
                'admin_id' => $admin->id,
                'status' => 'confirmed'
            ]);

            if ($booking->payment_method == 'office' && $booking->payment_status == 'unpaid') {
                $booking->update([
                    'payment_status' => 'paid'
                ]);
                $departure->decrement('capacity', $totalPerson);
            }

            Mail::to($customer->email)->send(new Invoice($booking, $tour, $customer, $transaction));

            alert('Thành công!', 'Xác nhận booking thành công.', 'success');
            return redirect()->back();
        }

        if ($request->action == 'cancel') {
            $booking->update([
                'admin_id' => $admin->id,
                'status' => 'canceled'
            ]);

            if ($booking->payment_status == 'paid') {
                $departure->increment('capacity', $totalPerson);
            }

            alert('Thành công!', 'Hủy booking thành công.', 'success');
            return redirect()->back();
            // return view('email.invoice');
        }
    }

    public function refund(Booking $booking) {
        if ($booking->payment_status == 'paid') {
            $booking->update([
                'payment_status' => 'refunded'
            ]);
        }
        
        alert('Thành công!', 'Hoàn tiền thành công.', 'success');
        return redirect()->back();
    }
}
