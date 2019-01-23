<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable {

    use Queueable, SerializesModels;

    public $from;

    public function __construct($request){
        $this->request = $request;
    }

    public function build(){
        return $this -> view('vendor.contact', ['data' => $this->request]);
    }
}
