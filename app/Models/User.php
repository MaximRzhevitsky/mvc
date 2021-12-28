<?php

namespace App\Models;
use PDO;
use App\Components\Db;

Class User extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();

    }

    public function checkUserData($login, $password)
    {
        $sql = $this->connection->prepare("SELECT * FROM users WHERE login =:login AND password =:password");
        $sql->bindParam(':login', $login, PDO::PARAM_STR);
        $sql->bindParam(':password', $password, PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function insertUser($name,$email)
    {
        $db = Db::getConnection();

        $user = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->execute();

        $user=(array)($user->fetch(PDO::FETCH_ASSOC));
        $user_id=$user["id"];

        if ($user == false) {
            $sql = 'INSERT INTO users(name,email) VALUES(:name, :email)';
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);

            if ($result->execute()) {
                return $db->lastInsertId();
            }
            return 0;
        } else {

            return $user_id;
        }
    }

}