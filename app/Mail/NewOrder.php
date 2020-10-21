<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.neworder')->subject('Новая заявка с сайта')->with('order')
                                                                            ->with([
                                                                                'name' => $this->order->name,
                                                                                'email' => $this->order->email,
                                                                                'phone' => $this->order->phone,
                                                                                'product' => $this->order->product->name,
                                                                            ]);
    }
}
