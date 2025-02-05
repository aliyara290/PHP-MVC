<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;

class SignUpController extends Controller
{
    public function signUp()
    {
        View::render('sign-up', ["userName" => Session::get("user_name")]);
    }
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $fullName = Validator::sanitize($_POST["user_fullName"]);
            $email = Validator::validateEmail($_POST["user_email"]);
            $password = Validator::validatePassword($_POST["user_password"]);
            $authMode = $this->model("Auth");
            $check = $authMode->register($fullName, $email, $password);
            if($check) {
                $this->redirect("/sign-in");
            }
        } 
    }
}
