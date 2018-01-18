<?php
namespace App\Libraries;

use App\Libraries\TestLibrary;

class Autoload{

  private $obj;

  function __construct()
  {
      $obj["TestLibrary"] = new TestLibrary;

      return $obj;
  }
}

 ?>
