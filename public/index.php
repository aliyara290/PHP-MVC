<?php 
require __DIR__ . "/../config/Database.php";
require __DIR__ . "/../vendor/autoload.php";
use App\Core\Router;
use App\Core\Session;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
use App\Controllers\SignUpController;
use App\Controllers\SignInController;
use App\Controllers\AuthController;

Session::start();
$router = new Router();
$router->get("/", HomeController::class, "showAllArticles");
$router->get("/article", ArticleController::class, "readByCondition");
$router->get("/sign-in", SignInController::class, "signInPage");
$router->post("/sign-in", SignInController::class, "logIn");
$router->get("/sign-up", SignUpController::class, "signUp");
$router->post("/sign-up", SignUpController::class, "register");
$router->get("/logout", AuthController::class, "logout");
$router->get("/admin/dashboard", HomeController::class, "showAllArticles");
$router->dispatch();