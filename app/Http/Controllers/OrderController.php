<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;
use App\Mail\NewOrder;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;

use Illuminate\Http\Request;

use App\Product;
use App\Order;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate(15);
        return view('admin.orders.index')->with('orders', $orders);
    }
    public function show($id)
    {
        $order = Order::all()->where('id', $id)->first();


        $adminEmail = config('app.adminEmail');
        $chatId = config('app.chatId');
        $massage = [
            'chat_id' => $chatId,
            'text' => '
            #новаязаявка #запрос #коммерческоепредложение
На сайте ' . config('app.url') . ' появилась новая заявка на ' . $order->product->name . '

Имя клиента: ' . $order->name . '
Номер телефона: ' . $order->phone . '
Электронная почта: ' . $order->email
        ];

        if($order->product === null) {
            Mail::to($order->email)->send(new OrderCreated($order));
        } else {
            Mail::to(config('app.adminEmail'))->send(new NewOrder($order));
        }
        Telegram::sendMessage($massage);

        return view ('admin.orders.show')->with(['order' => $order,
                            'products' => Product::get()
                            ]);
    }

    
}

 