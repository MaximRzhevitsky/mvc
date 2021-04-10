<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 29.08.2018
 * Time: 18:50
 */

namespace App\Controllers;

use App\Components\View;

class Controller
{
  //  protected View $view;

    function __construct()
    {
        $this->view = new View();
    }
}

?>