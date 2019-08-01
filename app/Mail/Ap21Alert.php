<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Ap21Alert extends Mailable
{
    use Queueable, SerializesModels;

    public $order,$data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,$data)
    {
        $this->order = $order;
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.apialert_new',['order'=> $this->order,'data'=>$this->data]);
    }
}
