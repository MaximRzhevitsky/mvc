<?php

namespace App\Models;
use PDO;

class Comments extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getAllComments($sort_type)
    {
        $str='SELECT comments.*, users.`name` as `name`
FROM comments INNER JOIN users ON (comments.`user_id`=users.`id`) WHERE status=1';

        if($sort_type){
            if($sort_type =='nameAsc'){
                $str .= ' ORDER BY name ASC';
            }
           else if($sort_type =='nameDsc'){
                $str .= ' ORDER BY name DESC';
            }
           else if($sort_type =='dateAsc'){
                $str .= ' ORDER BY date DESC';
            }
          else  if($sort_type =='dateDsc'){
                $str .= ' ORDER BY date ASC';
            }
        }
        $sql = $this->connection->prepare($str);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCommentById($id)
    {
        $id = intval($id);
        if ($id) {
            $sql = $this->connection->prepare("SELECT * FROM comments  WHERE id = :id");
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    }


    public function updateComment($text,$corrected,$id)
    {
        $sql=$this->connection->prepare("UPDATE comments SET text =:text, corrected =:corrected WHERE id =:id");
        $sql->bindParam('id',$id, PDO::PARAM_INT);
        $sql->bindParam('text',$text, PDO::PARAM_STR);
        $sql->bindParam('corrected',$corrected,PDO::PARAM_STR);
        return $sql->execute();
    }


    public function deleteComment($id)
    {
        $sql = $this->connection->prepare("DELETE FROM comments WHERE id=:id");
        $sql->bindParam('id', $id, PDO::PARAM_INT);
        return $sql->execute();
    }


    public function createComment($text,$user_id,$date,$image)
    {
        $sql = $this->connection->prepare("INSERT INTO Comments (text,user_id,date,image) VALUES(:text,:user_id,:date,:image)");
        $sql->bindParam(':text', $text, PDO::PARAM_STR);
        $sql->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $sql->bindParam(':date', $date, PDO::PARAM_STR);
        $sql->bindParam(':image', $image, PDO::PARAM_STR);
        return $sql->execute();
    }


    public function publicateComment($id)
    {
        $sql = $this->connection->prepare("UPDATE comments SET status=1 WHERE id=:id");
        $sql->bindParam('id',$id, PDO::PARAM_INT);
        return $sql->execute();
    }


    public function adminAllComments()
    {
        $sql = $this->connection->prepare("SELECT comments.*, users.`name` as `name`
FROM comments INNER JOIN users ON (comments.`user_id`=users.`id`)");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    }