<?php


class Db {

    protected $db_connect;
    protected $host = 'localhost';
    protected $dbname = 'work5';
    protected $encoding = 'utf8';
    protected $user = 'mysql';
    protected $pass = 'mysql';


    public function __construct()
    {
        $this->db_connect = new \PDO('mysql:host='.$this->host.'; dbname='.$this->dbname.'; charset='.$this->encoding.'', $this->user, $this->pass);
    }

    public function query($sql, $data = []) {
        $stmt = $this->db_connect->prepare($sql);
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':'.$key, $val, $type);
            }
        }
        $stmt->execute();
        return $stmt;
    }


}