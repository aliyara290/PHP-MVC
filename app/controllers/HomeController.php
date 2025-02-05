<?php 
namespace App\Controllers;
use App\Core\View;

class HomeController {
    public function home() {
        require __DIR__ . "/../views/front/home.twig";
    }
    public function signIn() {
        $data = [
            'title' => 'Welcome to Home Page',
            'username' => 'Yara'
        ];
        View::render('sign-in', $data);
    }

    public function signUp() {
        $data = [
            'title' => 'Welcome to Home Page',
            'username' => 'Yara'
        ];
        View::render('sign-up', $data);
    }
    public function create() {
        $data = [
            'title' => 'Welcome to Home Page',
            'username' => 'Yara'
        ];
        View::render('create', $data);
    }
}