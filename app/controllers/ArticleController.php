<?php 
namespace App\Controllers;
use App\Models\Article;
use App\Core\View;

class ArticleController {
    private $articleModel;
    public function __construct()
    {
        $this->articleModel = new Article();
    }
    public function showAllArticles() {
        $data = $this->articleModel->readAll();
        View::render('home', ["articles" => $data]);
        return $data;
    }
    // public function readByCondition() {
    //     $data = $this->articleModel->readByCondition();
    //     var_dump($data);
    //     View::render('home', $data);
    //     return $data;
    // }
}