<?php

namespace App\Http\Controllers;

use Config;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Mail\OrderCreated;
use App\Mail\NewOrder;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;

use App\Menu; 
use App\Product;
Use App\Category;
use App\Manufacturer;
use App\Order;

class IndexController extends Controller
{
    public function index( Request $request ) 
    {
        //Меню
        $menus = Menu::orderBy('order')->get();
        $menuArr = array();
        
        foreach($menus as $menu) {
            $item = array('id' => $menu->id, 'title' => $menu->name, 'url' => $menu->url);
            array_push($menuArr, $item);
        }
        
        $item = array('id' => '7', 'title' => 'Заказать звонок', 'url' => '#feedback', 'order' => '8');
        array_push($menuArr, $item); 
        
        $products = Product::select(
            ['id','name','alias','description','product_price','show_on_home'])
            ->where('show_on_home', '1')
            ->get();
       
        return view( 'pages.home', array( 'menuArr' => $menuArr))->with('products', $products);
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'agreement' =>'required|accepted'
        ]);
          
        $order = new Order([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'product_id' => $request->get('product_id'),
        'status' => $request->get('status'),
        'agreement' => $request->get('agreement')
        ]);
        
        $order->save();
       
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
    }

    public function callback(Request $request)
    {
        # code...
    }
}