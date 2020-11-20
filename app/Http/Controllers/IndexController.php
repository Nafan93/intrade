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
            ['id','name','alias','description','product_price','meta_title','meta_description','meta_keywords','show_on_home'])
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
        $url = config('app.url');
        $name = $order->name;
        $phone = $order->phone;
        $email = $order->email;

        if($order->product === null) {
            Mail::to($order->email)->send(new OrderCreated($order));
            Telegram::sendMessage([
                'chat_id' => config('app.chatId'),
                'text' => trans('messages.pricelist',[
                    'url' => $url,
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email
                ])
            ]);

        } else {
            Mail::to($adminEmail)->send(new NewOrder($order));
            Telegram::sendMessage([
                'chat_id' => config('app.chatId'),
                'text' => trans('messages.order',[
                    'url' => $url,
                    'product' => $order->product->name,
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email
                ])
            ]);
        }
        
    }

    public function callback(Request $request)
    {
        $order = new Order([
            'name' => $request->get('feedback_name'),
            'email' => $request->get('feedback_email'),
            'phone' => $request->get('feedback_phone'),
            'agreement' => $request->get('feedback_agreement')
            ]);
            
        $order->save();
    
        Telegram::sendMessage([
            'chat_id' => config('app.chatId'),
            'text' => trans('messages.callback',[
                'url' => config('app.url'),
                'name' => $order->name,
                'phone' => $order->phone,
                'email' => $order->email
            ])
        ]);
        return redirect('/#feedback');
    }
    public function bePartner(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'agreement' =>'required|accepted'
        ]);
          
        $order = new Order([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'status' => $request->get('status'),
            'agreement' => $request->get('agreement')
            ]);
            
        $order->save();
       
        Telegram::sendMessage([
            'chat_id' => config('app.chatId'),
            'text' => trans('messages.bepartner',[
                'url' => config('app.url'),
                'name' => $order->name,
                'phone' => $order->phone,
                'email' => $order->email
            ])
        ]);
    }
}