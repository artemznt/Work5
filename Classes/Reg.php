<?php

require_once 'Db.php';


class Reg extends Db
{
    private $first_name;
    private $last_name;
    private $patronymic;
    private $login;
    private $email;
    private $password;
    private $register;
    private $stmt;

    public function __construct()
    {
        parent::__construct();

        $this->first_name = isset($_POST['first_name']) ? $_POST['first_name'] : null;
        $this->last_name = isset($_POST['last_name']) ? $_POST['last_name'] : null;
        $this->patronymic = isset($_POST['patronymic']) ? $_POST['patronymic'] : null;
        $this->login = isset($_POST['login']) ? $_POST['login'] : null;
        $this->email = isset($_POST['email']) ? $_POST['email'] : null;
        $this->password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    }

    public function registerNewUser()
    {

            $this->register = "INSERT INTO `users` (first_name, last_name, patronymic, login, email, password) VALUES (:first_name, :last_name, :patronymic, :login, :email, :password)";
            $this->stmt = $this->db_connect->prepare($this->register);
            $this->stmt->bindParam(":first_name", $this->first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(":last_name", $this->last_name, PDO::PARAM_STR);
            $this->stmt->bindParam(":patronymic", $this->patronymic, PDO::PARAM_STR);
            $this->stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
            $this->stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
            $this->stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
            $this->stmt->execute();

            if (empty($this->login) || empty($this->email) || empty($this->password)) {
                echo 'Регистрация не удалась';
            }
            else {
                session_start();
                $_SESSION['login'] = $this->login;
                $_SESSION['password'] = $this->password;
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: /profile.php");
                exit();
            }
    }

}

$reg = New Reg();
if(!empty($_POST))
{
    $reg->registerNewUser();
}