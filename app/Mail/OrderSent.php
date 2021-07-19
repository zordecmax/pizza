<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSent extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected array $data;
//    protected string $name;
//    protected string $phone;
//    protected string $email;
//    protected bool $terms;
//    protected string $comment;
//    protected object $address;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@pizza.com.md')
            ->markdown('emails.order.sent', [
                'data' => $this->data,
            ]);
    }
}
