<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $products)
    {
        $this->order = $order;
        $this->products = $products;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order')->subject('Прайс-лист ООО "Интрейд"')
                                        ->with(['order', 'products'])
                                        ->with([
                                            'name' => $this->order->name,
                                            'email' => $this->order->email,
                                            'products' => $this->products
                                            ]);
    }
}
