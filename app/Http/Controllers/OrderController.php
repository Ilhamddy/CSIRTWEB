<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id)->load('user', 'orderItems.product', 'address');
        // dd($order);
        return view('pages.orders.detail', compact('order'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('pages.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'status' => 'required',
            'shipping_resi' => 'string|nullable',
            'shipping_service' => 'string|nullable',
        ]);
        // dd($validate);

        $order = Order::findOrFail($id);
        $order->update($validate);

        //send notification to user
        if ($validate['status'] == 'processing') {
            $this->sendNotificationToUser($order->first()->user_id, 'Paket sedang dikirim dengan resi ' . $validate['shipping_resi']);
        }

        return redirect()->route('order.index')->with('success', 'Order updated successfully');
    }

    public function sendNotificationToUser($userId, $message)
    {
        $user = User::findOrFail($userId);
        $token = $user->fcm_id;


        $messaging = app('firebase.messaging');
        $notification = Notification::create('Paket sedang dikirim', $message);

        $message = CloudMessage::withTarget('token', $token)->withNotification($notification);

        $messaging->send($message);
    }

    public function downloadPDF($id)
    {
        // dd($id);
        $date = mt_rand(00000, 99999);
        $data = Order::findOrFail($id)->load('user', 'orderItems.product', 'address');
        $pdf = Pdf::loadView('pages.orders.print', ['order' => $data]);
        return $pdf->stream('order-' . $date . '.pdf');
    }

    public function exportExcel()
    {
        // $datas = Order::with('user', 'orderItems.product', 'address')->get();
        // print_r($datas);
        $date = new DateTime();
        $date = $date->format('d-m-Y H:i:s');
        return Excel::download(new OrderExport, 'order-' . $date . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function getChatId()
    {
        // $updates = Telegram::getWebhookUpdates();
        // $chatId = $updates->getMessage()->getId();
        $chatId =
            Telegram::bot('mybot')->getUpdates();

        // $telegram = new Api('7122464091:AAEUrWMHmynTWjd84aJ53thjWCS5yQB4bIY');
        // $response = $telegram->getMe();
        // $response = $telegram->sendMessage([
        //     'chat_id' => '7122464091',
        //     'text' => 'Hello World'
        // ]);

        // $messageId = $response->getMessageId();

        return $chatId;
        // return $messageId;
        $updates = Telegram::getWebhookUpdates();
        $chatId = $updates->getMessage()->getChat()->getId();

        return $chatId;
    }
}
