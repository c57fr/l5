<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable {

  use Queueable, SerializesModels;

  public $user;


  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(User $user) {

    $this->user = $user;
  }


  /**
   * Build the message.
   *
   * @return $this
   */
  public function build() {

    $this->subject('Bienvenue dans C57, ' . $this->user->username . ' !');
    return $this->markdown('emails.welcome');
  }
}

/*
php artisan tinker
$w=new App\Mail\Welcome(App\User::first());
Mail::to(App\User::first())->send($w);
*/