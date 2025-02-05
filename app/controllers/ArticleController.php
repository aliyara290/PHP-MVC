<?php 
namespace App\Controllers;
use App\Core\Validator;
use App\Core\Session;
use App\Core\View;
use App\Core\Controller;

class ArticleController extends Controller {
    private $articleModel;
    public function __construct()
    {
        $this->articleModel = $this->model("Article");
    }
  
    public function readByCondition() {
        $id = Validator::sanitize($_GET["id"]);
        $this->articleModel->setArticleId($id);
        $data = $this->articleModel->readByCondition();
        if(!is_numeric($id)) {
            $this->redirect("/");
        } elseif(!$data) {
            $this->redirect("/");
        }
        View::render('article', [
            "article" => $data,
            "userName" => Session::get("user_name")
        ]);
        return $data;
    }
}