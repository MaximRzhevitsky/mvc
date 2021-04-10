<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 07.04.2021
 * Time: 16:21
 */

namespace App\Models;
use PDO;

Class User extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogin()
    {

        $sql = $this->connection->prepare("SELECT * FROM user");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetch();
    }


}




