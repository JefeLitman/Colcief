<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable {

    use Queueable, SerializesModels;

    public $from;

    public function __construct(){
        // $this->from = $form;
    }

    public function build(){
        return $this 
            -> view('vendor.contact')
            ;
        }
    }
