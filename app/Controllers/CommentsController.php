<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.09.2018
 * Time: 17:14
 */

namespace App\Controllers;

use App\Services\CommentsService;

class CommentsController extends Controller
{
 //   private CommentsService $commentsService;

    public function __construct()
    {
        parent::__construct();                                          // вызываем констракт-метод родителя, в котором создаётся объект View
        $this->commentsService = new CommentsService();                    // создаём объект модели комментариев для взаимодействия с базой
    }

    private function filterData($value = "")
    {                               // очистка пришедших данных от ненужных символов
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    public function store()
    {
        $result = true;                                             // флаг для пометки результата обработки POST-запроса

        if (isset($_POST['submit']) && !isset($_POST['name']) && isset($_POST['email']) && isset($_POST['theme']) && $_POST['comment']) {
            $_POST['name'] = $this->filterData($_POST['name']);
            $_POST['email'] = $this->filterData($_POST['email']);
            $_POST['theme'] = $this->filterData($_POST['theme']);
            $_POST['comment'] = $this->filterData($_POST['comment']);            // если форма пришла, то записываем безопасные данные в базу
            $newsId = $_POST['news_id'];

            $this->commentsService->setComment($_POST['name'], $_POST['email'], $_POST['theme'], $_POST['comment'], $newsId);
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);                             // если форма не пришла или не со всеми данными, то ставим флаг false
        }

        $this->view->result = $result;
        $this->view->newsCode = $_POST['news_code'];                    // устанавливаем переменную для использования в ссылке
        $this->view->categoryCode = $_POST['cat_code'];

        $this->view->generate('template_view.phtml', 'comments/index.phtml'); // формируем вьюшку

        return true;
    }


}

?>