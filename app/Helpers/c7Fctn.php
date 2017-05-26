<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 11/05/17
 * Time: 00:17
 */


use App\C7;

if (!function_exists('vd')) {
  /**
   * Instancie le var_dump "maison"
   * (Qui indique n° de ligne et fichier dans la debugbar)
   *
   * @param  mixed ...$value
   * @return string
   */
  function vd($args = 'null') {

    C7::vd($args);
  }
}
