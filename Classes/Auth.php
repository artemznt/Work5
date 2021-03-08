<?php

require_once 'Db.php';


class Auth extends Db
{
    private $login;
    private $password;
    private $auth;
    private $auth_login;
    private $hash_password;
    private $hash;

    public function __construct()
    {
        parent::__construct();

        $this->login = isset($_POST['login']) ? $_POST['login'] : null;
        $this->password = isset($_POST['password']) ? $_POST['password'] : null;

    }

    public function authUser()
    {

        $this->auth = $this->query("SELECT `login`, `password` FROM `users` WHERE `login` = '$this->login'");

        $rows = $this->auth->fetch();
        $this->auth_login .= $rows['login'];
        $this->hash_password .= $rows['password'];

        if (password_verify($this->password, $this->hash_password)) {
            session_start();
            $_SESSION['login'] = $this->login;
            $_SESSION['password'] = $this->password;
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /profile.php");
            exit(); }
        else {
            echo '<script>alert("Неправильный логин или пароль! Попробуйте еще раз."); location.href = \'/\';</script>';
        }

    }

}

$auth = New Auth();
if(!empty($_POST))
{
    $auth->authUser();
}