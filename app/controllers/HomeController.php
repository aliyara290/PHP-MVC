<?php 
namespace App\Controllers;
use App\Models\Article;
use App\Core\View;
use App\Core\Session;
use App\Core\Controller;

class HomeController extends Controller {
    private $articleModel;
    public function __construct()
    {
        $this->articleModel = $this->model("Article");
    }
    public function showAllArticles() {
        $data = $this->articleModel->readAll();
        View::render('home', [
            "articles" => $data,
            "userName" => Session::get("user_name")
        ]);
        return $data;
    }
}