<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.08.2018
 * Time: 11:31
 */
//news/sport/juventus-jenoa-anons-matcha
return [
    'news/([a-zA-Z-]+)/([a-zA-Z-]+)' => 'news/detail/$2',
    'news/([a-zA-Z-]+)' => 'news/index/$1',
    'news' => 'news/index',
    'comment' => 'comments/store',
    '^\s*$' => 'index/index',
    'cat_update/([0-9]+)'=>'Admin/cat_update/$1',
    'cat_create'=>'Admin/cat_create',
    'cat_delete/([0-9]+)'=>'Admin/category_delete/$1',
    'admin_panel'=>'Admin/category',
    'admin_category'=>'Admin/category',
    'admin'=>'Admin/login'

];
