<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\Midtrans\CreateVAService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class OrderController extends Controller
{

    //

    public function order(Request $request)
    {
        $validate = $request->validate([
            'address_id' => 'required',
            'payment_method' => 'required',
            'shipping_service' => 'required',
            'shipping_cost' => 'required',
            'items' => 'required',
        ]);

        $trx_id = 'INV-' . random_int(100000, 999999) . $request->user()->id;
        $subtotal = 0;
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $subtotal += $product->price * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'trx_id' => $trx_id,
            'address_id' => $validate['address_id'],
            'subtotal' => $subtotal,
            'shipping_cost' => $validate['shipping_cost'],
            'total_cost' => $subtotal + $request->shipping_cost,
            'status' => 'pending',
            'payment_method' => $validate['payment_method'],
            'payment_name' => $request->payment_name,
            'shipping_service' => $validate['shipping_service'],
        ]);

        // create order items
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => (int)$item['product_id'],
                'quantity' => (int)$item['quantity'],
            ]);
        }

        $midtrans = new CreateVAService($order->load(['user', 'orderitems']));
        $apiResponse = $midtrans->getVA();
        // dd($apiResponse);
        // print_r($apiResponse);
        $order->payment_va = $apiResponse->va_numbers[0]->va_number;
        $order->save();




        return response()->json([
            'status' => 'success',
            'message' => 'Order created successfully',
            'order' => $order,
        ]);
    }



    public function getOrderById($id)
    {
        $order = Order::with('orderItems.product')->find($id);

        $order->load('user', 'address');
        return response()->json([
            'order' => $order,
        ]);
    }

    public function checkStatusOrder($id)
    {
        $order = Order::find($id);
        return response()->json([
            'status' => $order->status,
        ]);
    }

    // function for get all order by user
    public function getOrderByUser()
    {
        $order = Order::with('orderItems.product', 'user')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()->map(function ($order) {
            return [
                'id' => (int)$order->id,
                'user_id' => (int)$order->user_id,
                'address_id' => (int)$order->address_id,
                'subtotal' => (int)$order->subtotal,
                'total_cost' => (int)$order->total_cost,
                'status' => $order->status,
                'payment_method' => $order->payment_method,
                'payment_name' => $order->payment_name,
                'payment_va' => $order->payment_va,
                'shipping_service' => $order->shipping_service,
                'created_at' => $order->created_at,
                'updated_at' => $order->updated_at,
                'order_items' => $order->orderItems->map(function ($item) {
                    return [
                        'id' => (int)$item->id,
                        'order_id' => (int)$item->order_id,
                        'product_id' => (int)$item->product_id,
                        'quantity' => (int)$item->quantity,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at,
                        'product' => [
                            'id' => (int)$item->product->id,
                            'category_id' => (int)$item->product->category_id,
                            'name' => $item->product->name,
                            'description' => $item->product->description,
                            'image' => $item->product->image,
                            'price' => (int)$item->product->price,
                            'stock' => (int)$item->product->stock,
                            'is_available' => (int)$item->product->is_available,
                            'created_at' => $item->product->created_at,
                            'updated_at' => $item->product->updated_at,
                        ],
                    ];
                }),
                'user' => [
                    'id' => (int)$order->user->id,
                    'name' => $order->user->name,
                    'email' => $order->user->email,
                    'fcm_id' => $order->user->fcm_id,
                    'phone' => $order->user->phone,
                    'roles' => $order->user->roles,
                    'email_verified_at' => $order->user->email_verified_at,
                    'created_at' => $order->user->created_at,
                    'updated_at' => $order->user->updated_at,
                ],
            ];
        });
        return response()->json([
            'order' => $order,
        ]);
    }
}
