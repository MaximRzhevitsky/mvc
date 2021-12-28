<?php

namespace App\Controllers;

use App\Models\Comments;
use App\Models\User;

class AdminController
{
    public function login()
    {
        if (isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $errors = false;
            $this->user = new User();
            $checklogin = $this->user->checkUserData($login, $password);

            if (empty($checklogin))
            {
                $errors[] = 'Неправильные данные для входа на сайт';
            }
            else header("Location: cabinet");
        }
        require_once(ROOT.'/app/Views/login.php');
        return true;
    }


    public function Cabinet()
    {
        $this->comments = new Comments();
        $commentsList = $this->comments->adminAllComments();
        require_once(ROOT . '/app/Views/cabinet.php');
        return true;
    }


    public function editComment($id)
    {
        $this->comments = new Comments();
        $comment = $this->comments->getCommentById($id);

        if (isset($_POST['submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы
            $text=$_POST['text'];
            $id=$comment['id'];
            $this->comments = new Comments();
            $corrected=1;

            $res = $this->comments->updateComment($text, $corrected, $id);

            if($res) header("Location: /cabinet");
        }
        require_once(ROOT . '/app/Views/edit_comment.php');
    }


    public function deleteComment($id)
    {
        $this->comments = new Comments();
        $res = $this->comments->deleteComment($id);

        if($res) header("Location: /cabinet");
    }


    public function publicate($id)
    {
        $this->comments = new Comments();
        $res = $this->comments->publicateComment($id);

        if($res) header("Location: /cabinet");
    }
}