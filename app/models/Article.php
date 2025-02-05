<?php 
namespace App\Models;
use App\Core\Crud;

class Article {

    private string $table = "article";
    private int $articleId = 2;

    public function setArticleId($id) {
        $this->articleId = $id;
    }
    
    public function create($data) {
        return Crud::create($this->table, $data);
    }
    public function update($data) {
        return Crud::update($this->table, $data, "id", $this->articleId);
    }
    public function delete() {
        return Crud::delete($this->table, "id", $this->articleId);
    }
    public function readAll() {
        return Crud::readAll($this->table);
    }
    public function readByCondition() {
        return Crud::readByCondition($this->table, "id", $this->articleId);
    }
}