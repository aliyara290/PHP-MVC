<?php 
require __DIR__ . "/../config/Database.php";
require __DIR__ . "/../vendor/autoload.php";
use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
$router = new Router();
$router->get("/", ArticleController::class, "showAllArticles");
$router->get("/sign-in", HomeController::class, "signIn");
$router->get("/sign-up", HomeController::class, "signUp");
$router->get("/article", HomeController::class, "create");
$router->dispatch();