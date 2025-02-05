<?php
namespace App\Models;

use Config\Database;
use App\Core\Security;
use App\Core\Session;
use PDO;

class Auth
{
    private $pdo;
    private $table = 'users';

    public function __construct()
    {
        $this->pdo = Database::getInstance();
        Session::start();
    }

    public function register($fullName, $email, $password)
    {
        $hashedPassword = Security::hashPassword($password);
        $sql = "INSERT INTO $this->table (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $fullName,
            'email' => $email,
            'password' => $hashedPassword
        ]);
    }

    public function login($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && Security::verifyPassword($password, $user['password'])) {
            Session::set('user_id', $user['id']);
            Session::set('user_name', $user['name']);
            Session::set('logged_in', true);
            return true;
        }

        return false;
    }

    public static function isLoggedIn()
    {
        return Session::has('logged_in') && Session::get('logged_in') === true;
    }

    public static function logout()
    {
        Session::remove('user_id');
        Session::remove('user_name');
        Session::remove('logged_in');
        Session::destroy();
    }
}
