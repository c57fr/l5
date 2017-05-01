<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoiLocal extends Mailable {
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct() {
    //
    $this->build();
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build() {
    //        return $this->view('view.name');
    $this->from = 'example@example.com';
    return $this;
  }
}
