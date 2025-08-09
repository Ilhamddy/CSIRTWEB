<?php

namespace App\Services\Midtrans;

use App\Services\Midtrans\Midtrans;
use App\Models\Order;
use Midtrans\Notification;

class CallbackService extends Midtrans
{
    protected $notification;
    protected $order;
    protected $serverKey;

    public function __construct()
    {
        parent::__construct();

        $this->serverKey = config('midtrans.server_key');
        $this->_handleNotification();
    }

    public function isSignatureKeyVerified()
    {
        return ($this->_createLocalSignatureKey() === $this->notification->signature_key);
        // return $this->_createLocalSignatureKey();
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraud_status = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraud_status && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }

    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getOrder()
    {
        return $this->order;
    }

    protected function _createLocalSignatureKey()
    {
        $order_id = $this->order->trx_id;
        $status_code = $this->notification->status_code;
        $gross_amount = $this->order->total_cost . ".00";
        $server_key = $this->serverKey;
        $input = $order_id . $status_code . $gross_amount . $server_key;
        // print_r($gross_amount);

        $signature = hash('sha512', $input);

        return $signature;
    }

    protected function _handleNotification()
    {
        $notification = new Notification();

        $trx_id = $notification->order_id;
        $order = Order::where('trx_id', $trx_id)->first();

        $this->notification = $notification;
        $this->order = $order;
    }
}
