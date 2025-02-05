<?php 
namespace App\Core;
use App\Core\View;

class Controller {
    public function render($view, $data = []) {
        extract($data);
        require "../views/front/$view.php";
    }
}