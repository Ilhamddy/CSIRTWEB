<?php

namespace App\Services\Midtrans;

use Midtrans\CoreApi;

class CreateVAService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getVA()
    {
        // dd($order);
        // $item_details = [];
        foreach ($this->order->orderItems as $item) {
            $item_details[] = [
                'id' => $item->product->id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'name' => $item->product->name,
            ];
        }

        $item_details[] = [
            'id' => 'SHIPPING COST',
            'price' => $this->order->shipping_cost,
            'quantity' => 1,
            'name' => 'SHIPPING COST',
        ];

        $params = [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
                'order_id' => $this->order->trx_id,
                'gross_amount' => $this->order->total_cost,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $this->order->user->name,
                'email' => $this->order->user->email,
                // 'phone' => '081234567890',
            ],
            'bank_transfer' => [
                'bank' => $this->order->payment_name,
            ],
        ];

        $response = CoreApi::charge($params);
        // print_r($response);
        // var_dump($response);

        return $response;
    }
}
