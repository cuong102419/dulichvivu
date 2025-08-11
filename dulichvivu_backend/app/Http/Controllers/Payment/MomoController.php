<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Departure;
use App\Models\MomoTransaction;
use App\Models\PendingBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MomoController extends Controller
{
    public function momo($code, $total, $pending, $link)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = env('MOMO_PARTNERCODE');
        $accessKey = env('MOMO_ACCESSKEY');
        $secretKey = env('MOMO_SECRETKEY');

        $bookingInfo = "Thanh toán qua MoMo";
        $amount = $total;
        $bookingCode = $code;
        $redirectUrl = route('momo');
        $ipnUrl = route('momo');
        $extraData = base64_encode(json_encode([
            'pending' => $pending,
            'link' => $link
        ]));

        $requestId = uniqid();
        $requestType = "payWithCC";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $bookingCode . "&orderInfo=" . $bookingInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $bookingCode,
            'orderInfo' => $bookingInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        if (isset($jsonResult['payUrl'])) {
            return $jsonResult['payUrl'];
        } else {
            Log::error('MoMo response error: ' . $result);
            return null;
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momoConfirm(Request $request)
    {
        $data = $request->all();

        $extra = json_decode(base64_decode($data['extraData']), true);
        $pendingId = $extra['pending'] ?? null;
        $redirectLink = $extra['link'] ?? '/';

        $rawData = "accessKey=" . env('MOMO_ACCESSKEY')
            . "&amount=" . $data['amount']
            . "&extraData=" . $data['extraData']
            . "&message=" . $data['message']
            . "&orderId=" . $data['orderId']
            . "&orderInfo=" . $data['orderInfo']
            . "&orderType=" . $data['orderType']
            . "&partnerCode=" . $data['partnerCode']
            . "&payType=" . $data['payType']
            . "&requestId=" . $data['requestId']
            . "&responseTime=" . $data['responseTime']
            . "&resultCode=" . $data['resultCode']
            . "&transId=" . $data['transId'];

        $signature = hash_hmac("sha256", $rawData, env('MOMO_SECRETKEY'));

        if ($signature !== $data['signature']) {
            return response()->json(['status' => false, 'message' => 'Chữ ký không hợp lệ.'], 400);
        }

        $momo = [
            'order_code' => $data['orderId'],
            'request_id' => $data['requestId'],
            'trans_id' => $data['transId'],
            'order_type' => $data['orderType'],
            'pay_type' => $data['payType'],
            'amount' => $data['amount'],
            'result_code' => $data['resultCode'],
            'message' => $data['message'],
            'signature' => $data['signature'],
            'response_time' => date('Y-m-d H:i:s', $data['responseTime'] / 1000),
        ];

        $momoTransaction = MomoTransaction::create($momo);
        $pendingBooking = PendingBooking::findOrFail($pendingId);

        if ($data['resultCode'] == 0) {
            $departure = Departure::findOrFail($pendingBooking['departure_id']);

            $bookingData  = $pendingBooking->toArray();
            $bookingData['payment_status'] = 'paid';

            $booking = Booking::create($bookingData);

            $totalPerson = $booking['number_adults'] + $booking['number_children'];

            $departure->update([
                'capacity' => $departure->capacity - $totalPerson,
                'booked' => $departure->booked + 1
            ]);

            $pendingBooking->delete();
            
            return redirect()->away($redirectLink . '&status=true');
        }
        
        $pendingBooking->delete();
        
        return redirect()->away($redirectLink . '&status=fail');
    }
}
