<?php

namespace App\Controllers;

use App\Models\Comments;
use App\Models\User;
use App\Components\SimpleImage;

class IndexController
{
    public function index($sort_type)
    {
        $this->comments = new Comments();
        $commentsList = $this->comments->getAllComments($sort_type);
        $imagename=false;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $text = $_POST['text'];
            $email = $_POST['email'];
            $date = date('Y-m-j h:i:s');

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поле Имя';
            }
            if (!isset($text) || empty($text)) {
                $errors[] = 'Заполните поле Комментарий';
            }
            if (!isset($email) || empty($email)) {
                $errors[] = 'Заполните поле Почта';
            }


                // загрузка изображения
            $image=(array)$_FILES['userImage'];

                if ($image["name"] !== "") {

                    $fileTmpName = $_FILES['userImage']['tmp_name'];

                   if (!is_uploaded_file($fileTmpName)) {

                      echo ('Ошибка загрузки') ;
                        die();
                    } else {
                        echo 'Ошибок нет.';
                    }

                    //проверка на изображение
                    $fi = finfo_open(FILEINFO_MIME_TYPE);
                    $mime = (string)finfo_file($fi, $fileTmpName);
                    if (strpos($mime, 'image') === false)

                        die('Можно загружать только изображения.');


                    $image = getimagesize($fileTmpName);

                    $limitBytes = 1024 * 1024 * 5;
                    $limitWidth = 320;
                    $limitHeight = 240;

                    //изменение размера картинки
                    if (($image[1] > $limitHeight) || ($image[0] > $limitWidth)){
                        $iso = new SimpleImage();
                        $iso->load($fileTmpName);
                        $iso->resize(320, 240);
                        $iso->save($fileTmpName);
                    }

                    //новое имя
                    $extension = image_type_to_extension($image[2]);

                    $imagename = mt_rand(0, 10000).$extension;


                    //перемещаем файл
                    if (!move_uploaded_file($fileTmpName, $_SERVER['DOCUMENT_ROOT'] . '/resources/images/'.$imagename)) {
                        die('При записи изображения на диск произошла ошибка.');
                    }

                }
            if ($errors == false) {

                $this->user = new User();
                $user_id = $this->user->insertUser($name, $email);

                $this->comments = new Comments();
                $this->comments->createComment($text, $user_id, $date, $imagename);

            }
        }
            require_once(ROOT . '/app/index.php');
            return true;
        }

  }