<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class CallbackController extends Controller
{
    public function callback()
    {
        $callback = new CallbackService();
        $order = $callback->getOrder();
        // dd($callback->isSignatureKeyVerified());
        dd($order);

        if ($callback->isSignatureKeyVerified()) {
            if ($callback->isSuccess()) {
                $order->update([
                    'status' => 'paid',
                ]);
                $trxId = $order['trx_id'];
                $amount = $order['total_cost'];
                $payment_method = $order['payment_name'];
                $trxDate =  date('Y-m-d H:i:s', strtotime('+7 hours'));

                $text = "NEW TRANSACTION\n"
                    . "Trx Id: $trxId\n"
                    . "Amount: Rp. $amount\n"
                    . "Payment Method: $payment_method\n"
                    . "Trx Date: $trxDate\n"
                    . "Success";
                $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
                $response = $telegram->sendMessage([
                    'chat_id' => env('TELEGRAM_CHAT_ID'),
                    'text' => $text
                ]);
            } else if ($callback->isExpire()) {
                $order->update([
                    'status' => 'expired',
                ]);
            } else if ($callback->isCancelled()) {
                $order->update([
                    'status' => 'cancelled',
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'callback success',
            ]);
            return response()->json([
                'status' => 'failed',
                'message' => 'callback failed',
            ]);
        }
    }
}
