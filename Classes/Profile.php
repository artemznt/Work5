<?php

require_once 'Db.php';


class Profile extends Db
{
    private $login;
    private $first_name;
    private $last_name;
    private $patronymic;
    private $password;
    private $profile;
    private $stmt;

    public function __construct()
    {
        parent::__construct();

        $this->login = isset($_POST['login']) ? $_POST['login'] : null;
        $this->first_name = isset($_POST['first_name']) ? $_POST['first_name'] : null;
        $this->last_name = isset($_POST['last_name']) ? $_POST['last_name'] : null;
        $this->patronymic = isset($_POST['patronymic']) ? $_POST['patronymic'] : null;
        $this->password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    }

    public function updateUser()
    {

        $this->profile = "UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name, `patronymic` = :patronymic, `password` = :password WHERE `login` = :login";
        $this->stmt = $this->db_connect->prepare($this->profile);
        $this->stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
        $this->stmt->bindParam(":first_name", $this->first_name, PDO::PARAM_STR);
        $this->stmt->bindParam(":last_name", $this->last_name, PDO::PARAM_STR);
        $this->stmt->bindParam(":patronymic", $this->patronymic, PDO::PARAM_STR);
        $this->stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
        $this->stmt->execute();

        if (empty($this->first_name) || empty($this->last_name) || empty($this->password)) {
            echo 'Регистрация не удалась';
        }
        else {
            echo '<script>alert("Данные обновлены!"); location.href = \'/profile.php\';</script>';
        }
    }

}

$profile = New Profile();
if(!empty($_POST))
{
    $profile->updateUser();
}