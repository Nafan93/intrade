<?php

namespace App\Http\Controllers;

use Config;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\OrderCreated;
use App\Mail\NewOrder;

use Telegram\Bot\Exceptions\TelegramResponseException;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;

use App\Manufacturer;
Use App\Category;
use App\Product;
use App\Order;
use App\Menu; 
use App\User;
use App\Role;

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
        'phone' => $request->get('phone'),
        'email' => $request->get('email'),
        'product_id' => $request->get('product_id'),
        'status' => $request->get('status'),
        'agreement' => $request->get('agreement')
        ]);
        
        $order->save();
        
        $products = Product::all();
        $admins=  User::whereHas('roles', function($query) {
            $query->where('name', '=', 'Admin');
        })->get();

        if($order->product === null) {
            Mail::to($order->email)->send(new OrderCreated($order, $products));
            foreach($admins as $admin) {
                try {
                    Telegram::sendMessage([
                        'chat_id' => $admin->chat_id,
                        'text' => trans('messages.pricelist',[
                            'url' => config('app.url'),
                            'name' => $order->name,
                            'email' => $order->email
                        ])
                    ]);
                } catch (TelegramResponseException $e) {
                    echo 'block';
                }
            }
        } else {
            foreach($admins as $admin) {
                Mail::to($admin->email)->send(new NewOrder($order));
                try {
                    Telegram::sendMessage([
                        'chat_id' => $admin->chat_id,
                        'text' => trans('messages.order',[
                            'url' => config('app.url'),
                            'product' => $order->product->name,
                            'name' => $order->name,
                            'phone' => $order->phone,
                            'email' => $order->email
                        ])
                    ]);
                } catch (TelegramResponseException $e) {
                    echo 'block';
                }
            }
        }
        
    }

    public function callback(Request $request)
    {
        $order = new Order([
            'name' => $request->get('feedback_name'),
            'phone' => $request->get('feedback_phone'),
            'agreement' => $request->get('feedback_agreement')
            ]);
            
        $order->save();
    
        Telegram::sendMessage([
            'chat_id' => config('app.chatId'),
            'text' => trans('messages.callback',[
                'url' => config('app.url'),
                'name' => $order->name,
                'phone' => $order->phone
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
            'phone' => $request->get('phone'),
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