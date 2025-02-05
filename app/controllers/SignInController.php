<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;

class SignInController extends Controller
{
    public function signInPage()
    {
        View::render('sign-in', ["userName" => Session::get("user_name")]);
    }
    public function logIn()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = Validator::validateEmail($_POST["user_email"]);
            $password = Validator::validatePassword($_POST["user_password"]);
            $authMode = $this->model("Auth");
            $check = $authMode->login($email, $password);
            if($check) {
                $this->redirect("/");
            }
        } else "failed";
    }
}
