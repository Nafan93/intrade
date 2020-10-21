<?php

namespace App\Http\Controllers;

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

        return view ('admin.orders.show')->with(['order' => $order,
                            'products' => Product::get()
                            ]);
    }

    
}

 