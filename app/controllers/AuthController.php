<?php
namespace App\Controllers;

use App\Core\Session;
use App\Core\Controller;

class AuthController extends Controller
{
    public function logout()
    {
        Session::destroy();
        $this->redirect("/");
    }
}
