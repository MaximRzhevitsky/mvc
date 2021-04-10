<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 08.04.2021
 * Time: 14:37
 */

namespace App\Controllers;

use App\Models\User;
use App\Models\Categories;

class AdminController
{
    private $user;
    private $categories;
    public $admin = array();

    function __construct()
    {
        $this->user = new User();
        $this->categories=new Categories();
    }

            public function login(){
                $admin = $this->user->getLogin();
                if (!empty($_POST['name']) && !empty($_POST['password'])){
                    $login= $_POST['name'];
                    $pass=$_POST['password'];
                    if(($login==$admin['login']) && ($pass==$admin['password'])){
                        header("Location: /admin_category");
                    }
                    else {
                        echo "Не правильный логин или пароль";
                    }
                }
                else {
                    echo 'форма не отправлена';
                }
                require_once(ROOT . '/App/Views/admin/admin_login.phtml');
                return true;
            }

    public function category(){
        $categoryList = $this->categories->getCategories();

        require_once (ROOT. '/App/Views/admin/admin_category.phtml');

    }

    public function cat_update($id){
        if (isset($_POST['cat_code']) || isset($_POST['cat_name'])) {
            $new_cat_code = $_POST['cat_code'];
            $new_cat_name = $_POST['cat_name'];
            $new_id=$this->categories->updateCategory($new_cat_code,$new_cat_name,$id);
            if($new_id){
            }
            header("Location: /admin_panel");
        }
        require_once (ROOT. '/App/Views/admin/cat_update.phtml');
return true;
    }

    public function category_delete($id){
        $categoryId=$this->categories->getCategoryById($id);
        if(isset($_POST['submit'])){
            $del_id=$this->categories->deleteCategory($id);
            if($del_id){
            }
            header("Location: /admin_panel");
        }
        require_once (ROOT. '/App/Views/admin/cat_delete.phtml');
    }


    public function cat_create(){
        if (isset($_POST['cat_code']) || isset($_POST['cat_name'])) {
            $new_cat_code = $_POST['cat_code'];
            $new_cat_name = $_POST['cat_name'];
            $new_category=$this->categories->createCategory($new_cat_code,$new_cat_name);
            if($new_category){
            }
            header("Location: /admin_panel");
        }

        require_once (ROOT. '/App/Views/admin/cat_create.phtml');
        return true;
    }

}