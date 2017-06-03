<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 28/05/17
 * Time: 09:18
 */

namespace App\Billing;


class Stripe {

  protected $key;


  public function __construct($key) {

    $this->key = $key;
  }
  
  
  public function getKey() {

    return $this->key;


  }
}