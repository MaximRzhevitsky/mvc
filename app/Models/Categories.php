<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 05.09.2018
 * Time: 19:06
 */

namespace App\Models;

use PDO;

class Categories extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories() {

        $sql = $this->connection->prepare("SELECT * FROM category");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCategoryById($id)
    {
        $id = intval($id);
        if ($id) {
            $sql = $this->connection->prepare("SELECT * FROM category  WHERE cat_id = :id");
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);

        }
    }
        public function updateCategory($new_cat_code,$new_cat_name,$id){

            $sql=$this->connection->prepare("UPDATE category SET cat_code =:new_cat_code, cat_name =:new_cat_name WHERE cat_id =:id");
            $sql->bindParam('id',$id, PDO::PARAM_INT);
            $sql->bindParam('new_cat_name',$new_cat_name, PDO::PARAM_STR);
            $sql->bindParam('new_cat_code',$new_cat_code,PDO::PARAM_STR);
            return $sql->execute();


        }

    public function deleteCategory($id){

        $sql=$this->connection->prepare("DELETE FROM category  WHERE cat_id =:id");
        $sql->bindParam('id',$id, PDO::PARAM_INT);

        return $sql->execute();

    }

    public function createCategory($new_cat_code,$new_cat_name){

        $sql=$this->connection->prepare("INSERT INTO `category` (`cat_code`,`cat_name`) VALUES(:new_cat_code,:new_cat_name)");
        $sql->bindParam('new_cat_code',$new_cat_code, PDO::PARAM_STR);
        $sql->bindParam('new_cat_name',$new_cat_name,PDO::PARAM_STR);
        return $sql->execute();


    }





}






