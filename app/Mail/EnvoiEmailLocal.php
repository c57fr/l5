<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 01/05/17
 * Time: 12:25
 */

namespace App\Mail;


use DebugBar;

class EnvoiEmailLocal {

  /**
   * EnvoiEmailLocal constructor.
   */
  public function __construct() {

    Debugbar::info('Class EnvoiEmailLocal');
    return view('pages.contact');
  }
}